<?php

namespace App\Repositories;

interface EntityInterface
{
    public function store($data);

    public function getAll();

    public function getById($id);

    public function update($id, $data, $excepts = [], $only = []);

    public function delete($id);
}
