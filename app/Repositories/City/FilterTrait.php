<?php

namespace App\Repositories\City;

trait FilterTrait
{
    public function scopeQ($query, $q)
    {
        if ($q) {
            return $query->where('name', 'like', "%${q}%");
        }
        return $query;
    }
     public function scopeCityId($query, $q)
    {
        if (is_numeric($q)) {
            $query->where('voucher.city_id', $q);
        }

        return $query;
    }
}
