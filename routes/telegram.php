<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Commands\Start;
use App\Telegram\Middleware\ChatCreateOrUpdate;

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
$bot->middlewares([
    ChatCreateOrUpdate::class
]);

$bot->onCommand('start', Start::class)->description('Start command');
