<?php
namespace App\Services;

use OpenAI;

class EliBotService
{
    public function analyzeMessage($message)
    {
        $prompt = "
        Analyze this user message and extract if it's a financial command.
        Return a JSON with these keys: action, amount, title,.
        If no command, return {\"action\":\"none\"}.
        Message: $message
        ";

        $client = OpenAI::client(env('OPENAI_API_KEY'));
        $response = $client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => 'You are an AI assistant that extracts structured commands from user text.'],
                ['role' => 'user', 'content' => $prompt]
            ]
        ]);

        $result = $response->choices[0]->toArray()['message']['content'] ?? '{}';
        if (empty($result)) {
            $result = 'پاسخی از سرور دریافت نشد.';
        }

        return json_decode($result, true);
    }
}
