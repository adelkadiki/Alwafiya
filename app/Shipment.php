<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    //

     protected $guarded = [];

    public function package()
    {
      return $this->hasOne(Package::class);
    }
}
