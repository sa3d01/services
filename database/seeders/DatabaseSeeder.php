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
        $this->call([
            PermissionSeeder::class,
//            SettingSeeder::class,
//            CitySeeder::class,
//            SliderSeeder::class,
//            ContactTypeSeeder::class,
//            UserSeeder::class,
//            CategorySeeder::class,
//            BankSeeder::class,
//            PackageSeeder::class,
        ]);
    }
}
