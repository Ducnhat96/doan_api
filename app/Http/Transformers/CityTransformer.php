<?php

namespace App\Http\Transformers;

use App\Http\Transformers\Traits\FilterTrait;

use App\Repositories\City\City;
use League\Fractal\ParamBag;
use League\Fractal\TransformerAbstract;
class CityTransformer extends  TransformerAbstract
{
    use FilterTrait;
    protected $availableIncludes
        = [
            'voucher'
        ];

    public function transform(City $city = null)
    {
        if (is_null($city)) {
            return [];
        }

        return [
            'id'           => $city->id,
            'name'         => $city->name,
            'slug'         => $city->slug,
            'hot'          => $city->hot,
        ];
    }

    public function includeVoucher(City $city = null)
    {
        if (is_null($city)) {
            return $this->null();
        }
        return $this->collection($city->voucher, new VoucherTransformer());
    }


}
