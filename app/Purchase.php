<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['purchase_id','purchase_quantity','purchase_company', 'order_date', 'purchase_date', 'product_id'];
}
