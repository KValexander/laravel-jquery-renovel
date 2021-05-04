<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DeveloperModel;

class DeveloperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DeveloperModel::factory()->count(9)->create();
    }
}
