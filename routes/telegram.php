<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Commands\Start;
use App\Telegram\Middleware\ChatCreateOrUpdate;
use App\Telegram\Middleware\SwitchModule;
use Nwidart\Modules\Facades\Module;

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
