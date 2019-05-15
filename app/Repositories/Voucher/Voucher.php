<?php

namespace App\Repositories\Voucher;

use Illuminate\Database\Eloquent\Model;

// Định nghĩa trạng thái tour
const AVAILABLE      = 1;
const UNAVAILABLE    = 0;

// Định nghĩa phương tiện vận chuyển
const FIGHT      = 1;
const CAR        = 2;

const VOUCHER_STATUS = [
    self::AVAILABLE      => 'Còn chỗ',
    self::UNAVAILABLE    => 'Hết chỗ',
];
const TRANSPORT_TYPE = [
    self::FIGHT      => 'Máy Bay',
    self::CAR    => 'Ô TÔ',
];
class Voucher extends Model
{
    protected $table = 'voucher';

    protected $fillable = [
        'name','checkin','checkout','destination','price','link_detail','city_id',
        'transport_id','rating','supplier','time','schedule','image','status'

    ];

    public function city()
    {
        return $this->belongsTo(\App\Repositories\City\City::class, 'city_id');
    }
}
