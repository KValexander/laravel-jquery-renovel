<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DPlatformModel;

class DPlatformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DPlatformModel::factory()->count(9)->create();
    }
}
