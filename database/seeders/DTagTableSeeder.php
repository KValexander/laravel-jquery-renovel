<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DTagModel;

class DTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DTagModel::factory()->count(9)->create();
    }
}
