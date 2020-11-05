<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;
    protected $fillable = ['order_Detail_id', 'product_id', 'order_id', 'shopment_status_id', 'order_detail_number', 'order_quantity', 'shipment_date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
