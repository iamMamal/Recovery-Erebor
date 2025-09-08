<?php

namespace App\Livewire\Dashboard\Ai;


use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use OpenAI;

class ChatResponse extends Component
{
    public array $prompt;
    public array $messages;
    public ?string $response = null;
    public bool $loading = false;

    public function mount()
    {
        // 1️⃣ داده‌های کاربر از دیتابیس

        $this->getResponse();
    }
    public function getResponse()
    {

        $userId = auth()->id();
        $today = now()->format('Y-m-d');
        $cacheKey = "user_{$userId}_daily_messages_{$today}";

        $count = Cache::get($cacheKey, 0);
        if ($count >= 9) {
            session()->flash('error');
            return;
        }

        // افزایش شمارنده پیام
        Cache::put($cacheKey, $count + 1, now()->endOfDay());

        $this->loading = true;

        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $response = $client->chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => $this->messages,
        ]);


        $this->response = $response->choices[0]->toArray()['message']['content'] ?? '{}';
        if (empty($this->response)) {
            $this->response = 'پاسخی از سرور دریافت نشد.';
        }
        $this->loading = false;
        $replyText = '';

    }
    public function render()
    {
        return view('livewire.dashboard.ai.chat-response');
    }
}
