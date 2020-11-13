<?php

namespace App\Notifications;

use App\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewLeadHasBeenAssigned extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var Lead
     */
    public $lead;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
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
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("New Lead Has Been Assigned: " . $this->lead->full_name)
            ->greeting('Hello ' . $notifiable->first_name . ',')
            ->line('A new lead has been assigned to you. Please log in to acknowledge the lead.')
            ->action('Login Now',route('home'));
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
