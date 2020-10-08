<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'item_id', 'price', 'amount', 'in_date'
    ];

    public function item($value='')
    {
      return $this->belongsTo('App\Item');
    }
}
