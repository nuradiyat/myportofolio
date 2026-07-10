<?php

namespace App\Services;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class EmailService
{
    public function sendContactNotification(ContactMessage $contactMessage): bool
    {
        $emailTarget = config('contact.receiver_email');
        $receiverName = config('contact.receiver_name');

        if (!$emailTarget || !filter_var($emailTarget, FILTER_VALIDATE_EMAIL)) {
            Log::warning('Email receiver invalid or missing.', [
                'contact_message_id' => $contactMessage->id,
            ]);

            return false;
        }

        try {
            Mail::send('emails.contact-message-notification', [
                'contactMessage' => $contactMessage,
                'receiverName' => $receiverName,
            ], function ($message) use ($contactMessage, $emailTarget, $receiverName) {
                $message->to($emailTarget, $receiverName)
                    ->replyTo($contactMessage->email, $contactMessage->name)
                    ->subject('Pesan Baru dari Website Portfolio: ' . $contactMessage->subject);
            });

            return true;
        } catch (Throwable $e) {
            Log::error('Failed to send contact email notification.', [
                'message' => $e->getMessage(),
                'contact_message_id' => $contactMessage->id,
            ]);

            return false;
        }
    }
}