<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GenreModel;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	GenreModel::factory()->count(9)->create();
    }
}
