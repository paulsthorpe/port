<?php

use Illuminate\Database\Seeder;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
      'title' => 'Laravel'
      ]);
      DB::table('categories')->insert([
      'title' => 'Javascript'
      ]);
      DB::table('categories')->insert([
      'title' => 'Angular2'
      ]);
      DB::table('categories')->insert([
      'title' => 'PHP'
      ]);
    }
}
