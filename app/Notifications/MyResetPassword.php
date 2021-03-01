<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPassword extends Notification
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Notifica recupero password')
            ->greeting('Ciao!')
            ->line('Stai ricevendo questa mail perchè è stata inoltrata una richiesta di recupero password per il tuo account.')
            ->action('Recupera Password', url('reset-password/' . $this->token . '?email=' . $notifiable->email))
            ->line('Questo link scadrà tra 60 minuti.')
            ->line('Se non hai richiesto tu il recupero della password, non è richiesta alcuna azione.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
