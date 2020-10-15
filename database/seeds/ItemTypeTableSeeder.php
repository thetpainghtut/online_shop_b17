<?php

use Illuminate\Database\Seeder;
use App\ItemType;

class ItemTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $itemType = new ItemType;
      $itemType->name = 'HaHa';
      $itemType->save();
    }
}
