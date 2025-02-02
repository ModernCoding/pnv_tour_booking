<?php

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
      $this->call([
        CountriesTableSeeder::class,
        DestinationsTableSeeder::class,
        IdentificationTypesTableSeeder::class,
        TitlesTableSeeder::class,
        UserTypesTableSeeder::class,
        UsersTableSeeder::class
      ]);
    }
}
