<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\EmailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactController extends Controller
{
    public function __construct(
        protected EmailService $emailService
    ) {}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        try {
            // Simpan pesan ke database
            $contactMessage = ContactMessage::create($validatedData);

            // Kirim notifikasi email ke pemilik website
            $emailSent = $this->emailService->sendContactNotification($contactMessage);

            // Catat jika email gagal dikirim, tetapi data tetap berhasil disimpan
            if (! $emailSent) {
                Log::warning('Contact message saved, but email notification failed.', [
                    'contact_message_id' => $contactMessage->id,
                ]);
            }

            return redirect('/#contact')
                ->with('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
        } catch (Throwable $exception) {

            Log::error('Failed to save contact message.', [
                'error' => $exception->getMessage(),
            ]);

            return redirect('/#contact')
                ->withInput()
                ->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }
}