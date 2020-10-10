<?php

namespace App\Notifications;

use App\ContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactUsNotification extends Notification
{
    use Queueable;

    protected $contactus;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ContactUs $contactUs)
    {
        //
        $this->contactus=$contactUs;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase()
    {
        return [
          //  ContactUs::all()
            'id'=>$this->contactus->id ,
            'title'=>$this->contactus->title ,
            'email'=>$this->contactus->email ,
            'date'=>$this->contactus->created_at
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }


}
