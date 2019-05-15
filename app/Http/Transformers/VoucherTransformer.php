<?php

namespace App\Http\Transformers;
use App\Repositories\Voucher\Voucher;
use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;
class VoucherTransformer extends  TransformerAbstract
{
    protected $availableIncludes = [
        'city',
    ];

    public function transform(Voucher $voucher = null)
    {
        if (is_null($voucher)) {
            return [];
        }

        return [
            'id'           => $voucher->id,
            'name'         => $voucher->name,
            'checkin'      => $voucher->checkin,
            'checkout'     => $voucher->checkout,
            'destination'  => $voucher->destination,
            'price'        => $voucher->price,
            'link_detail'  => $voucher->link_detail,
            'transport_id' => $voucher->transport_id,
            'supplier'     => $voucher->supplier,
            'time'         => $voucher->time,
            'schedule'     => $voucher->schedule,
            'city_id'      => $voucher->city_id,
            'rating'       => $voucher->rating,
            'image'        => $voucher->image,
            'status'       => $voucher->status
        ];
    }
    public function includeCity(Voucher $voucher = null)
    {
        if (is_null($voucher)) {
            return $this->null();
        }
        return $this->item($voucher->city, new CityTransformer());
    }

}
