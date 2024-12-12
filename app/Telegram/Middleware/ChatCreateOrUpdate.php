<?php

namespace App\Telegram\Middleware;

use SergiX44\Nutgram\Nutgram;
use App\Repositories\ChatRepository;

class ChatCreateOrUpdate
{
    protected ChatRepository $repository;

    public function __construct()
    {
        $this->repository = new ChatRepository;
    }

    public function __invoke(Nutgram $bot, $next): void
    {
        $this->repository->updateOrCreate([
            'chat_id' => $bot->chat()->id,
        ], [
            'username'   => $bot->chat()->username,
            'first_name' => $bot->chat()->first_name,
            'last_name'  => $bot->chat()->last_name,
        ]);

        cache()->put('chat', [
            'chat_id'    => $bot->chat()->id,
            'username'   => $bot->chat()->username,
            'first_name' => $bot->chat()->first_name,
            'last_name'  => $bot->chat()->last_name,
        ], 60);

        $next($bot);
    }
}
