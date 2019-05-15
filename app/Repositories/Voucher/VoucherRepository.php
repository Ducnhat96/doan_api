<?php

namespace App\Repositories\Voucher;

use App\Repositories\BaseRepository;

class VoucherRepository extends BaseRepository implements VoucherRepositoryInterface
{
    protected $model;

    public function __construct(Voucher $voucher)
    {
        $this->model = $voucher;
    }



}
