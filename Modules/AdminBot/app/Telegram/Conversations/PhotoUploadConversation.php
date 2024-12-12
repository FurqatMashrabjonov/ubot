<?php

namespace Modules\AdminBot\Telegram\Conversations;

use SergiX44\Nutgram\Nutgram;
use App\Repositories\ImageRepository;
use SergiX44\Nutgram\Conversations\Conversation;

class PhotoUploadConversation extends Conversation
{
    protected ImageRepository $repository;

    public function __construct()
    {
        $this->repository = new ImageRepository;
    }

    public function start(Nutgram $bot)
    {
        $bot->sendMessage('Rasm yuklang');
        $this->next('secondStep');
    }

    public function secondStep(Nutgram $bot)
    {
        $photo     = $bot->message()->photo[0];
        $file_path = $bot->getFile($photo->file_id)->file_path;
        $this->repository->updateOrCreate([
            'file_id' => $photo->file_id,
        ], array_merge(
            $photo->toArray(),
            [
                'path'       => $file_path,
                'thumbnails' => json_encode($bot->message()->photo),
            ]
        ));
        $bot->sendMessage('Rasm yuklandi');
    }
}
