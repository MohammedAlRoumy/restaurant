<?php

namespace App\Http\Controllers;

use App\Category;
use App\ContactUs;
use App\Meal;
use App\Notifications\ContactUsNotification;
use App\OurTeam;
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
        $teams  = OurTeam::latest()->limit(3)->get();
        $categories  = Category::all();;

        return view('site.index',compact('teams','categories'));
    }

    public function contactus()
    {

        $teams  = OurTeam::latest()->limit(3)->get();
        $categories  = Category::all();;

        return view('site.index',compact('teams','categories'));

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
                'content.required'=>'الرسالة مطلوبة'
            ]);
    }

    public function contactusAdd(Request $request)
    {
        //$user= Auth::user();
        $user = User::first();
        DB::beginTransaction();
        try {
        $validator = $this->contactusValidator($request->all());
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $contactus = ContactUs::create([
            'title' => $request['title'],
            'email' => $request['email'],
            'content' => $request['content'],
        ]);
        $request->session()->flash('success', "تم ارسال الرسالة بنجاح، شكراً لتواصلك معنا");

            DB::commit();

            $user->notify(new ContactUsNotification($contactus));

           // Notification::send($user, new ContactUsNotification());

        return redirect()->back();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}


