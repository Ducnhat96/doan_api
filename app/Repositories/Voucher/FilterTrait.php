<?php

namespace App\Repositories\Voucher;

use App\Repositories\GlobalTrait;

trait FilterTrait
{
    use GlobalTrait;

    // public function scopeName($query, $q)
    // {
    //     if ($q) {
    //         $roomColumns      = $this->columnsConverter(['id', 'created_at', 'updated_at']);
    //         $roomTransColumns = $this->columnsConverter(['name'], 'room_translates', false);
    //         $columns          = self::mergeUnique($roomColumns, $roomTransColumns);
    //         // $slug_q = generate_slug_address($q);
    //         $query
    //             ->addSelect($columns)
    //             ->join('room_translates', 'rooms.id', '=', 'room_translates.room_id')
    //             ->where([
    //                 ['room_translates.name', 'like', "%${q}%"],
    //                 ['room_translates.lang', 'vi'],
    //             ])
    //             ->OrWhere([
    //                 ['room_translates.address', 'like', "%${q}%"],
    //                 ['room_translates.lang', 'vi']
    //             ]);
    //         // $query = $query->OrWhere('rooms.id', 'like', "%${q}%");
    //     }
    //     return $query;
    // }


    public function scopeCityId($query, $q)
    {
        if (is_numeric($q)) {
            $query->where('voucher.city_id', $q);
        }

        return $query;
    }


    public function scopeStatus($query, $q)
    {

        if (array_key_exists($q, $this::VOUCHER_STATUS)) {
            $query->where('voucher.status', $q);
        }

        return $query;
    }
    public function scopeTransport($query, $q)
    {

        if (array_key_exists($q, $this::TRANSPORT_TYPE)) {
            $query->where('voucher.transport_id', $q);
        }

        return $query;
    }

    public function scopePriceFrom($query, $q)
    {
        if (is_numeric($q)) {
            $query->where('voucher.price', '>=', $q);
        }
        return $query;
    }

    public function scopePriceTo($query, $q)
    {
        if (is_numeric($q)) {
            $query->where('voucher.price', '<=', $q);
        }
        return $query;
    }

    public function scopeTime($query, $q)
    {
        if (is_numeric($q)) {
            $query->where('voucher.time', '>=', $q);
        }

        return $query;
    }

    public function scopeSortPrice($query, $q)
    {
        $sort = 'asc';
        if (is_numeric($q) && $q == 1) {
            $sort = 'desc';
        }
        return $query->where('voucher.price', '>', 0)->orderBy('voucher.price', $sort);
    }

    public function scopeAvgRating($query, $q)
    {
        if (is_numeric($q)) {
            $query->where('vouhcher.rating', '>=', $q);
        }
        return $query;
    }

    // public function scopeAddress($query, $q)
    // {
    //     if (!empty($q)) {
    //         if (!self::isJoined($query, 'room_translates')) {
    //             $query->join('room_translates', 'rooms.id', '=', 'room_translates.room_id')->select('rooms.*');
    //         }


    //         $query = $query->where('address', 'like', "%${q}%")
    //             ->where('lang', 'vi');
    //     }
    //     return $query;
    // }
}
