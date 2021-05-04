<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DCountryModel;

class DCountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DCountryModel::factory()->count(9)->create();
    }
}
