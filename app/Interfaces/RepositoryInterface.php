<?php

namespace App\Interfaces;

interface RepositoryInterface
{
    public function get();

    public function store();

    public function update();

    public function delete();
}
