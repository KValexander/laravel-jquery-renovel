<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NovelModel;

class NovelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	NovelModel::factory()->count(9)->create();
    }
}
