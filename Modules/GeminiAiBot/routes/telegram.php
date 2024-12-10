<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Commands\Start;
use App\Telegram\Middleware\ChatCreateOrUpdate;
use App\Telegram\Middleware\SwitchModule;

/*
|--------------------------------------------------------------------------
| Nutgram Handlers
|--------------------------------------------------------------------------
|
| Here is where you can register telegram handlers for Nutgram. These
| handlers are loaded by the NutgramServiceProvider. Enjoy!
|
*/

//Global middlewares
$bot->onCommand('start', function (\SergiX44\Nutgram\Nutgram $bot) {
    $bot->sendMessage('Hello, I am a Gemini AI Bot. I can help you with your daily tasks. Please type /help to see the list of available commands.');
})->description('Start command');
