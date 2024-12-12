<?php

/** @var SergiX44\Nutgram\Nutgram $bot */

use Nwidart\Modules\Facades\Module;
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
    ChatCreateOrUpdate::class,
]);

require_once $bot->getGlobalData('module', Module::find('MainBot')->getPath()) . '/routes/telegram.php';
