<?php

namespace App\View\Components;

use App\User;
use Illuminate\View\Component;

class NotificationsDropdown extends Component
{
    public $notifications = [];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->notifications = User::first()->notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notifications-dropdown');
    }
}
