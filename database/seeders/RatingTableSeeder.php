<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RatingModel;

class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	RatingModel::factory()->count(9)->create();
    }
}
