<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class SmsNotification extends Notification
{
    use Queueable;

    protected $phoneNumber;
    protected $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($phoneNumber, $message)
    {
        $this->phoneNumber = $phoneNumber;
        $this->message = $message;
    }

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSmsNotification($notifiable);

        // Make HTTP request to the API endpoint
        $response = Http::post($message['api_url'], $message['data']);

        // Check if the request was successful
        if ($response->successful()) {
            return true;

        } else {
            return false;
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [SmsNotification::class];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toSmsNotification(object $notifiable): array
    {
        // Define the data to be sent via the API
        return [
            'api_url' => 'https://run.mocky.io/v3/' . env('MOCKY_KEY'),
            'data' => [
                'phone_number' => $this->phoneNumber,
                'message' => $this->message,
            ]];
    }
}
