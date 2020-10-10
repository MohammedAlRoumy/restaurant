<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
       // $user= User::first();
       // $notifications = $user->unreadNotifications;
  //   return   $notifications;
//dd($notifications);
        return view('dashboard.home');
    }
}
