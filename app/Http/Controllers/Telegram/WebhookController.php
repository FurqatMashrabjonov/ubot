<?php

namespace App\Http\Controllers\Telegram;

use App\Models\Chat;
use Illuminate\Http\Request;
use SergiX44\Nutgram\Nutgram;
use Illuminate\Support\Facades\Log;
use Nwidart\Modules\Facades\Module;
use App\Http\Controllers\Controller;

class WebhookController extends Controller
{
    public function __invoke(Nutgram $bot, Request $request)
    {
        try {
            $chat = Chat::query()->where('chat_id', $request->message['chat']['id'])->first();

            $module = Module::find(!is_null($chat) ? $chat->product()?->first()?->module_name ?? 'MainBot' : 'MainBot'); //TODO: change, make it database driven

            $bot->setGlobalData('module', $module->getPath());

            $bot->run();
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        } finally {
            return response()->noContent();
        }
    }
}
