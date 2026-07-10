<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    public function sendMessage(string $target, string $message): bool
    {
        $token = config('contact.fonnte_token');
        $target = $this->normalizePhoneNumber($target);

        if (!$token || !$target) {
            Log::warning('WhatsApp target or token missing.');
            return false;
        }

        try {
            $response = Http::timeout(30)
                ->withHeaders([
                    'Authorization' => $token,
                ])
                ->asForm()
                ->post('https://api.fonnte.com/send', [
                    'target' => $target,
                    'message' => $message,
                    'countryCode' => '62',
                ]);

            if (!$response->successful()) {
                Log::error('Failed to send WhatsApp notification.', [
                    'status' => $response->status(),
                    'target' => $target,
                ]);

                return false;
            }

            return true;
        } catch (\Throwable $e) {
            Log::error('WhatsApp service exception.', [
                'message' => $e->getMessage(),
                'target' => $target,
            ]);

            return false;
        }
    }

    private function normalizePhoneNumber(string $number): string
    {
        $number = preg_replace('/\D+/', '', trim($number));

        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }

        return $number;
    }
}