<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TagModel;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	TagModel::factory()->count(9)->create();
    }
}
