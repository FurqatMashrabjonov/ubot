<?php

namespace App\Repositories;

use App\Models\Image;
use App\Interfaces\RepositoryInterface;

class ImageRepository implements RepositoryInterface
{
    public function updateOrCreate(array $attributes, array $values)
    {
        return Image::query()->updateOrCreate($attributes, $values);
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
