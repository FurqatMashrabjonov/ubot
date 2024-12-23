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
$bot->middlewares([
    ChatCreateOrUpdate::class,
//    SwitchModule::class
]);

require_once $bot->getGlobalData('module') . '/routes/telegram.php';

//$bot->onCommand('start', Start::class)->description('Start command');
