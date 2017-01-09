<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['category' => 'School life']);
        DB::table('categories')->insert(['category' => 'Action']);
        DB::table('categories')->insert(['category' => 'Comedy']);
    }
}
