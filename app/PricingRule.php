<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingRule extends Model
{
    //
    protected $fillable = ['disc_rate','product_id','min_quan','type'];

    public function Products(){
        return $this->belongsTo(Product::class);
    }
}
