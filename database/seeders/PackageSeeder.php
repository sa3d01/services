<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DropDown;
use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name_ar'=>'اشتراك شهري',
            'name_en'=>'monthly',
            'price'=>50
        ]);
        Package::create([
            'name_ar'=>'اشتراك ربع سنوي',
            'name_en'=>'quarter',
            'price'=>125
        ]);
        Package::create([
            'name_ar'=>'اشتراك نصف سنوي',
            'name_en'=>'have year',
            'price'=>240
        ]);
        Package::create([
            'name_ar'=>'اشتراك سنوي',
            'name_en'=>'year',
            'price'=>450
        ]);
    }
}
