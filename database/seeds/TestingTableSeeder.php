<?php

use Illuminate\Database\Seeder;
use App\Testing;

class TestingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $testing = new Testing;
      $testing->title = 'Testing Title';
      $testing->item_type_id = 1;
      $testing->save();
    }
}
