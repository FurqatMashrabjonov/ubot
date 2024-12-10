<?php

namespace App\Console\Commands;

use App\Console\Services\WebhookService;
use Illuminate\Console\Command;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use SergiX44\Nutgram\Nutgram;

class HookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:hook {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(WebhookService $webhookService): void
    {
        $action = $this->argument('action');

        try {
            $bot = new Nutgram(config('nutgram.token'));
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            $this->error('Token not found');
        }

        if ($action === 'set') {
            $res = $webhookService->set($bot);
        } elseif ($action === 'unset') {
            $res = $webhookService->unset($bot);
        } else {
            $res = 'Invalid action';
        }

        $this->info($res);
    }
}
