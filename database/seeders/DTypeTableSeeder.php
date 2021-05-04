<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DTypeModel;

class DTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DTypeModel::factory()->count(9)->create();
    }
}
