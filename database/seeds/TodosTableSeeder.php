<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('todos')->truncate();

     DB::table('todos')->insert([
         [
             'title'      => 'フレームワークカリキュラムを終わらせる',
             'created_at' => '2015-04-06 23:59:59',
             'updated_at' => '2015-04-07 23:59:59',
         ],
         [
             'title'      => 'Unixオペレーションに慣れる',
             'created_at' => '2015-02-01 00:00:00',
             'updated_at' => '2015-02-01 00:00:00',
         ],
     ]);

    }
}
