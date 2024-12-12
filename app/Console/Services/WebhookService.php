<?php

namespace App\Console\Services;

use SergiX44\Nutgram\Nutgram;
use GuzzleHttp\Exception\GuzzleException;
use SergiX44\Nutgram\Telegram\Exceptions\TelegramException;

class WebhookService
{
    protected function getWebhookUrl(): string
    {
        return config('app.webhook_url') . route('webhook', [], false);
    }

    /**
     * @throws TelegramException
     * @throws GuzzleException
     * @throws \JsonException
     */
    public function set(Nutgram $bot)
    {
        \Log::info($this->getWebhookUrl());

        try {
            $bot->setWebhook($this->getWebhookUrl());
        } catch (TelegramException $e) {
            return $e->getMessage();
        }

        return 'Webhook set successfully';
    }

    public function unset(Nutgram $bot): string
    {
        try {
            $bot->deleteWebhook();
        } catch (GuzzleException|TelegramException|\JsonException $e) {
            return $e->getMessage();
        }

        return 'Webhook unset successfully';
    }
}
