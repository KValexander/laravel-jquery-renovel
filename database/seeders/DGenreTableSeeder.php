<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DGenreModel;

class DGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DGenreModel::factory()->count(9)->create();
    }
}
