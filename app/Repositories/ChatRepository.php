<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Chat;

class ChatRepository implements RepositoryInterface
{

    public function updateOrCreate(array $attributes, array $values)
    {
        return Chat::query()->updateOrCreate($attributes, $values);
    }

    public function store()
    {

    }

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
