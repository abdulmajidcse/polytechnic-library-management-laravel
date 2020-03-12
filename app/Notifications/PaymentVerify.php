<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentVerify extends Notification
{
    use Queueable;
    public $user = array();
    public $email;
    public $payment;
    public $verifyCode;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $email, $payment, $verifyCode)
    {
        $this->user = $user;
        $this->email = $email;
        $this->payment = $payment;
        $this->verifyCode = $verifyCode;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Are you ' . $this->user->name . ' and your PIMS number ' . $this->user->pims_no . '?')
                    ->line('Remember! Total payment to you ' . $this->payment . ' tk.')
                    ->line('If this information right for you, please verify payment by code that sent you bellow.')
                    ->line('Your verification code: ' . $this->verifyCode)
                    ->line('Thank you for using our application!');
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
