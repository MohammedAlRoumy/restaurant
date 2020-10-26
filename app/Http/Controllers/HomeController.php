<?php

namespace App\Http\Controllers;

use App\Category;
use App\ContactUs;
use App\Meal;
use App\Notifications\ContactUsNotification;
use App\OurTeam;
use App\Reservation;
use App\Table;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Throwable;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teams = OurTeam::latest()->limit(3)->get();
        $categories = Category::all();
        $tables = Table::all();


        return view('site.index', compact('teams', 'categories', 'tables'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // return request()->post('which');
        $which = request()->post('which');
        if ('first_form' == $which) {
            //  return $request;
            $this->reservationAdd($request);
        }
        if ('second_form' == $which) {
            $this->contactusAdd($request);
        }
        return redirect()->back();
    }

    public function contactus()
    {

        $teams = OurTeam::latest()->limit(3)->get();
        $categories = Category::all();
        $tables = Table::all();

        return view('site.index', compact('teams', 'categories', 'tables'));

    }

    public function contactusValidator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'email' => 'required|email',
            'content' => 'required',
        ],
            [
                'title.required' => 'الاسم مطلوب',
                'title.max' => 'العنوان يجب أن لا يزيد عن 250 حرف',
                'email.required' => 'البريد الإلكتروني مطلوب',
                'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
                'content.required' => 'الرسالة مطلوبة'
            ]);
    }

    public function contactusAdd($request)
    {
        // ( $request);
        dump($request);
        //$user= Auth::user();
        $user = User::first();
        DB::beginTransaction();
        try {
            $validator = $this->contactusValidator($request->all());
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            //   dd($request->all());
            $contactus = ContactUs::create([
                'title' => $request['title'],
                'email' => $request['email'],
                'content' => $request['content'],
            ]);

            DB::commit();

            $user->notify(new ContactUsNotification($contactus));
            // Notification::send($user, new ContactUsNotification());

            $request->session()->flash('success', "تم ارسال الرسالة بنجاح، شكراً لتواصلك معنا");
            return redirect()->back();

        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }


    /*************************************/
    /****************************************************************************/
    /**************************************/

    public function reservation()
    {
        $teams = OurTeam::latest()->limit(3)->get();
        $categories = Category::all();
        $tables = Table::all();

        return view('site.index', compact('teams', 'categories', 'tables'));
    }

    public function reservationValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'table' => 'required',
            'date' => 'required',
            'timefrom' => 'required',
            'timeto' => 'required',
        ]);
    }

    public function reservationAdd($request)
    {
        //dd ($request);
        //   try {
        $validator = $this->ReservationValidator($request->all());
        if ($validator->fails()) {
            Alert::error('خطأ', 'هناك خطأ في عملية الحجز, خطأ في الفلديشن');
            return redirect()->back();
        }

        $existing = Reservation::where('table', '=', $request->table)
            ->where('date', '=', $request->date)
            ->where(function ($q) use ($request) {
                $q->whereBetween('timefrom', [$request->timefrom, $request->timeto])
                    ->orWhereBetween('timeto', [$request->timefrom, $request->timeto])
                    ->orWhere(function ($q) use ($request) {
                        $q->where('timefrom', '<', $request->timefrom)
                            ->where('timeto', '>', $request->timeto);
                    });
            })->get();
        if ($existing->count() > 0) {
            Alert::error('خطأ', 'هناك خطأ في عملية الحجز , اختار موعد اخر ');
            $request->session()->flash('error', "فشل في عملية الحجز ");
            return redirect()->back();


        } else {
           // dd(setting('fromtime1') );
           // dd(Carbon::parse( $request->timefrom)->format('H:i'));
          //  dd(Carbon::parse( $request->timefrom)->format('g:i A'));
            if ( setting('fromtime1') > Carbon::parse( $request->timefrom)->format('H:i') || setting('totime1') < Carbon::parse($request->timeto)->format('H:i')) {
                Alert::error('خطأ', 'هناك خطأ في عملية الحجز , المطعم مغلق في هذا الوقت ، ساعات الدوام من السابعة صباحاً إلى الحادية عشر مساءً');
                return redirect()->back();
            }else{
                $reservation = Reservation::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'table' => $request->table,
                    'date' => $request->date,
                    'timefrom' => $request->timefrom,
                    'timeto' => $request->timeto,
                ]);
                Alert::success('تم بنجاح', 'تمت عملية الحجز بنجاح');
                return redirect()->back();
            }
        }
        /* }    catch (\Exception $exception) {
             return $exception;
              return redirect()->back()->with('هذا الحجز موجود مسبقا');
         }*/
    }


}


