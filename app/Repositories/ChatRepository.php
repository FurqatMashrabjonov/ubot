<?php

namespace App\Repositories;

use App\Models\Chat;
use App\Interfaces\RepositoryInterface;

class ChatRepository implements RepositoryInterface
{
    public function updateOrCreate(array $attributes, array $values)
    {
        return Chat::query()->updateOrCreate($attributes, $values);
    }

    public function store() {}

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
