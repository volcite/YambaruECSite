<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_id','product_name','category_id', 'price', 'description', 'sale_status_id', 'product_status_id', 'regist_date', 'user_id', 'delete_flag'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
