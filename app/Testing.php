<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
  protected $fillable = [
    'title', 'itemtype_id'
  ];

  public function item_type($value='')
  {
    return $this->belongsTo('App\ItemType');
  }
}
