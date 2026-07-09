<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Services\EmailService;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactController extends Controller
{
    public function __construct(
        protected EmailService $emailService,
        protected WhatsAppService $whatsAppService,
    ) {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        try {
            $contactMessage = ContactMessage::create($validated);

            $this->emailService->sendContactNotification($contactMessage);

            $whatsappTarget = config('contact.whatsapp_number');

            if (!empty($whatsappTarget)) {
                $this->whatsAppService->sendMessage(
                    $whatsappTarget,
                    $this->buildWhatsappMessage($contactMessage)
                );
            }

            return redirect('/#contact')
                ->with('success', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
        } catch (Throwable $e) {
            Log::error('Contact form error.', [
                'message' => $e->getMessage(),
            ]);

            return redirect('/#contact')
                ->withInput()
                ->with('error', 'Gagal mengirim pesan. Silakan coba lagi.');
        }
    }

    private function buildWhatsappMessage(ContactMessage $contactMessage): string
    {
        return "📩 *Pesan Baru dari Contact Form Website Portfolio*\n\n"
            . "*Nama:* {$contactMessage->name}\n"
            . "*Email:* {$contactMessage->email}\n"
            . "*Subject:* {$contactMessage->subject}\n\n"
            . "*Pesan:*\n{$contactMessage->message}";
    }
}
