<?php

namespace Modules\GeminiAiBot\Actions;

use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use Gemini\Laravel\Facades\Gemini;
use Nutgram\Laravel\Facades\Telegram;
use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\Telegram\Properties\ParseMode;

class AskGeminiAiExplainPhotoAction
{

    public static function explain(Nutgram $bot)
    {
        $photo = end($bot->message()->photo);
        $file_id = $photo->file_id;
        $file = Telegram::getFile($file_id);

        $result = Gemini::geminiProVision()
            ->generateContent([
                'What is this picture?',
                new Blob(
                    mimeType: MimeType::IMAGE_JPEG,
                    data: base64_encode(
                        file_get_contents(self::getFilePath($file->file_path))
                    )
                )
            ]);

        $bot->sendMessage($result->text(), parse_mode: ParseMode::MARKDOWN_LEGACY);
    }

    public static function getFilePath(string $path)
    {
        return 'https://api.telegram.org/file/bot' . config('nutgram.token') . '/' . $path;
    }

}
