<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'shipment_id', 'customer', 'custid', 'phone', 'email', 'description', 'recepient', 'recpphone', 'dimentions',
        'street', 'city', 'postcode', 'quantity', 'weight'
    ];

     protected $guarded = [];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }


}
