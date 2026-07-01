<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $token = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        if (! $token || ! $chatId) {
            Log::error('Telegram credentials are not configured');

            return response()->json(['message' => 'Service unavailable'], 503);
        }

        $text = "📩 <b>New message from portfolio</b>\n\n"
            .'<b>Name:</b> '.e($validated['name'])."\n"
            .'<b>Email:</b> '.e($validated['email'])."\n"
            .'<b>Subject:</b> '.e($validated['subject'])."\n\n"
            .'<b>Message:</b>'."\n".e($validated['message']);

        $response = Http::timeout(10)->post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => 'HTML',
        ]);

        if (! $response->successful()) {
            Log::error('Telegram API error', ['body' => $response->body()]);

            return response()->json(['message' => 'Failed to send'], 502);
        }

        return response()->json(['message' => 'OK']);
    }
}
