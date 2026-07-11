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
        $receiverEmail = config('contact.receiver_email');
        $receiverName = config('contact.receiver_name');

        // Pastikan email penerima tersedia dan valid
        if (empty($receiverEmail) || ! filter_var($receiverEmail, FILTER_VALIDATE_EMAIL)) {

            Log::warning('Contact receiver email is missing or invalid.', [
                'contact_message_id' => $contactMessage->id,
            ]);

            return false;
        }

        try {

            Mail::send(
                'emails.contact-message-notification',
                [
                    'contactMessage' => $contactMessage,
                    'receiverName' => $receiverName,
                ],
                function ($message) use ($contactMessage, $receiverEmail, $receiverName) {

                    $message
                        ->to($receiverEmail, $receiverName)
                        ->replyTo(
                            $contactMessage->email,
                            $contactMessage->name
                        )
                        ->subject(
                            'Pesan Baru dari Website Portfolio: ' .
                                $contactMessage->subject
                        );
                }
            );

            return true;
        } catch (Throwable $exception) {

            Log::error('Failed to send contact notification email.', [
                'contact_message_id' => $contactMessage->id,
                'error' => $exception->getMessage(),
            ]);

            return false;
        }
    }
}