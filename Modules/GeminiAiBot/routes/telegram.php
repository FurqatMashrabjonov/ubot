<?php
/** @var SergiX44\Nutgram\Nutgram $bot */

use App\Telegram\Commands\Start;
use App\Telegram\Middleware\ChatCreateOrUpdate;
use App\Telegram\Middleware\SwitchModule;
use Modules\GeminiAiBot\Actions\AskGeminiAiAction;
use Modules\GeminiAiBot\Actions\AskGeminiAiExplainPhotoAction;
use Modules\GeminiAiBot\Telegram\Conversations\GenerateTextConversation;

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
$bot->onCommand('start', \Modules\GeminiAiBot\Telegram\Commands\Start::class);

$bot->onMessage(fn($bot) => AskGeminiAiAction::ask($bot));
//$bot->onPhoto(fn($bot) => AskGeminiAiExplainPhotoAction::explain($bot));
