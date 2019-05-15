<?php

namespace App\Repositories\City;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use FilterTrait;

    protected $table = 'city';

    protected $fillable = [
        'name','hot','slug'
    ];

    public function voucher()
    {
        return $this->hasMany(\App\Repositories\Voucher\Voucher::class, 'city_id');
    }
}
