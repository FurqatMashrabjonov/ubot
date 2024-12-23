<?php

namespace App\Http\Controllers\Telegram;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Nwidart\Modules\Facades\Module;
use SergiX44\Nutgram\Nutgram;

class WebhookController extends Controller
{
    public function __invoke(Nutgram $bot, Request $request)
    {
        try {
            $chat = Chat::query()->where('chat_id', $request->message['chat']['id'])->first();

            $module = Module::find($chat->module ?? 'MainBot'); //TODO: change, make it database driven

            Log::info('modules', Module::all());

            $bot->setGlobalData('module', $module->getPath());
            $bot->run();
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        } finally {
            return response()->noContent();
        }
    }
}
