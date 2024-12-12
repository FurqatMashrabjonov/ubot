<?php

/** @var SergiX44\Nutgram\Nutgram $bot */

use Modules\AdminBot\Telegram\Commands\Photo;
use Modules\AdminBot\Telegram\Commands\Start;

$bot->onCommand('start', Start::class);

$bot->onCommand('photo', Photo::class);
