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
    $bot->sendMessage('Salom, bu asosiy bot');
})->description('Start command');
