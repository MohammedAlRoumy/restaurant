<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
//

    public function __construct()
    {
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create','store']);
        $this->middleware('permission:update_users')->only(['edit','update']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }

    public function index()
    {
        // $user= User::first();
        //   $notifications = $user->unreadNotifications;

        $reservations = Reservation::whenSearch(request()->search)->paginate();
        return view('dashboard.Reservations.index',compact('reservations'));
    }

    public function show($id)
    {
        //
        //  $user= User::first();
        // $notifications = $user->unreadNotifications;

        $reservation = Reservation::findOrFail($id);
        return view('dashboard.reservations.show',compact('reservation'));
    }

    public function destroy($id)
    {
        //
        $reservation = Reservation::findOrFail($id);

        //////////////////////////////
        $reservation->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.reservations.index');
    }
}
