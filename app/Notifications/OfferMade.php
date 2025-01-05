<?php

namespace App\Notifications;

use App\Models\Offer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OfferMade extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private Offer $offer
    )
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $formattedAmount = number_format($this->offer->amount, 2);
        return (new MailMessage)
                    ->line("You have received a new offer ({$formattedAmount}) on your listing.")
                    ->action('Go to listing', route('realtor.listing.show', $this->offer->listing->id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'offer_id' => $this->offer->id,
            'offer_amount' => $this->offer->amount,
            'listing_id' => $this->offer->listing->id,
            'listing_title' => $this->offer->listing->title,
            'user_id' => $this->offer->user->id,
            'user_firstname' => $this->offer->user->firstname,
            'user_lastname' => $this->offer->user->lastname,
            'user_email' => $this->offer->user->email,
        ];
    }
}
