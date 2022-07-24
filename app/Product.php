<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','price'];

    public function PricingRules(){
    	return $this->hasOne(PricingRule::class);
    }
}
