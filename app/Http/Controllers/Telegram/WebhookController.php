<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SergiX44\Nutgram\Nutgram;

class WebhookController extends Controller
{
    public function __invoke(Nutgram $bot)
    {
        try {
            $bot->run();
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        } finally {
            return response()->noContent();
        }
    }
}
