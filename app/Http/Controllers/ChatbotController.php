<?php

namespace App\Http\Controllers;

use App\Mail\QuoteRequestMail;
use App\Services\AnthropicChatService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ChatbotController extends Controller
{
    public function send(Request $request, AnthropicChatService $chat)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $history = $request->session()->get('chatbot_history', []);
        $history[] = ['role' => 'user', 'content' => $request->input('message')];

        try {
            $reply = $chat->reply($history, fn (array $input) => $this->sendQuoteEmail($input));
        } catch (\Throwable $e) {
            report($e);
            return response()->json([
                'reply' => 'Désolé, une erreur est survenue. Merci de réessayer ou de nous contacter au 01 23 45 67 89.',
            ]);
        }

        $history[] = ['role' => 'assistant', 'content' => $reply];
        $request->session()->put('chatbot_history', array_slice($history, -20));

        return response()->json(['reply' => $reply]);
    }

    public function reset(Request $request)
    {
        $request->session()->forget('chatbot_history');
        return response()->json(['status' => 'ok']);
    }

    protected function sendQuoteEmail(array $input): void
    {
        $data = Validator::make($input, [
            'nom'         => ['required', 'string', 'max:100'],
            'email'       => ['required', 'email', 'max:150'],
            'telephone'   => ['required', 'string', 'max:20'],
            'type'        => ['required', 'in:Particulier,Professionnel'],
            'code_postal' => ['nullable', 'string', 'max:10'],
            'message'     => ['nullable', 'string', 'max:2000'],
        ])->validate();

        $recipients = array_filter([
            config('quote.mail_to_1'),
            config('quote.mail_to_2'),
        ]);

        if (empty($recipients)) {
            $recipients = [config('mail.from.address')];
        }

        Mail::to($recipients)->send(new QuoteRequestMail($data));
    }
}