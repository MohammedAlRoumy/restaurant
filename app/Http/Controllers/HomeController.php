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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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

        $which = request()->post('which');
        if ('first_form' === $which) {
            $this->reservationAdd($request);
        } else if ('second_form' === $which) {
            $this->contactusAdd($request);
        }

        return redirect()->back();

        /* if(request()->input_name == 'first_form') {
             $this->reservationAdd($request);
         } else {
             $this->contactusAdd($request);
         }*/
    }

    protected function contactus()
    {

        $teams = OurTeam::latest()->limit(3)->get();
        $categories = Category::all();
        $tables = Table::all();


        return view('site.index', compact('teams', 'categories', 'tables'));

    }

    public function contactusValidator(array $data)
    {
        // dd($data);
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


    protected function reservationAdd($request)
    {

        $validator = $this->ReservationValidator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $eservation = Reservation::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'table' => $request['table'],
            'date' => $request['date'],
            'time' => $request['time'],
        ]);
        $request->session()->flash('success', "تمت عملية الحجز بنجاح، شكراً لك");
        return redirect()->back();
    }

    public function reservationValidator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'phone' => 'required',
                'table' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]
        /*,
        [
            'title.required' => 'الاسم مطلوب',
            'title.max' => 'العنوان يجب أن لا يزيد عن 250 حرف',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'content.required'=>'الرسالة مطلوبة'
        ]*/);
    }

}


