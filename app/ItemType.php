<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
  protected $fillable = [
    'name'
  ];

  public function testing($value='')
  {
    return $this->hasMany('App\Testing');
  }
}
