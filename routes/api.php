<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Telegram\WebhookController;

Route::post('webhook', WebhookController::class)->name('webhook');
