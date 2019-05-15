<?php

namespace App\Repositories\City;

use App\Repositories\BaseRepository;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    protected $model;

    public function __construct(City $city)
    {
        $this->model = $city;
    }



}
