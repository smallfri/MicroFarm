<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Lang;

class ActivationLink extends Notification
{
    use Queueable;

    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
	
        return (new MailMessage)
            ->subject("Account Activation Mail")
            ->greeting('Hello, ' . $notifiable->name)
            ->line("Thanks for signing up!")
            ->line("Your account has been created, you can login with your credentials after you have activated your account by pressing the url below.")
            ->action("Please click this link to activate your account ", url('activate-account/' . $notifiable->activation_token))
            ->line("Thanks again for joining the Micro Farm Manager family.  We have big plans for this application and look forward to sharing them with you.")
            ->line("Sincerely,")
            ->line("The Micro Farm Manager Team");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
