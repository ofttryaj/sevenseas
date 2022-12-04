<?php

namespace App\Model;

use Encore\Admin\Traits\DefaultDatetimeFormat;
use Illuminate\Database\Eloquent\Model;

class SevenseasSalePrice extends Model
{
    use DefaultDatetimeFormat;
    protected $table = 'sevenseas_sale_price';

    protected $dateFormat = 'U';
}