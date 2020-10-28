<?php

namespace App\Http\Controllers\Dashboard;

use App\ContactUs;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }

    public function index()
    {
        // $user= User::first();
     //   $notifications = $user->unreadNotifications;

        $contactus = ContactUs::whenSearch(request()->search)->paginate();
        return view('dashboard.contactus.index',compact('contactus'));
    }

    public function show($id)
    {
        //
      //  $user= User::first();
       // $notifications = $user->unreadNotifications;

        $contactus = ContactUs::findOrFail($id);
        return view('dashboard.contactus.show',compact('contactus'));
    }

    public function destroy($id)
    {
        //
        $catactus = ContactUs::findOrFail($id);

        //////////////////////////////
        $catactus->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.categories.index');
    }
}
