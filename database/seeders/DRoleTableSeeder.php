<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DRoleModel;

class DRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DRoleModel::factory()->count(9)->create();
    }
}
