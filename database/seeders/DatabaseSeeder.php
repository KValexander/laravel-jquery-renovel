<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
        	BookmarkTableSeeder::class,
        	CharacterTableSeeder::class,
			CommentTableSeeder::class,
			DCountryTableSeeder::class,
			DDurationTableSeeder::class,
			DeveloperTableSeeder::class,
			DGenreTableSeeder::class,
			DLanguageTableSeeder::class,
			DPlatformTableSeeder::class,
			DRoleTableSeeder::class,
			DTagTableSeeder::class,
			DTypeTableSeeder::class,
			GenreTableSeeder::class,
			NovelTableSeeder::class,
			PublisherTableSeeder::class,
			RatingTableSeeder::class,
			TagTableSeeder::class,
			UserTableSeeder::class
        ]);
    }
}
