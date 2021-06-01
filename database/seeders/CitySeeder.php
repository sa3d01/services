<?php

namespace Database\Seeders;

use App\Models\DropDown;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DropDown::create([
            'class'=>'City',
            'name_ar'=>'الرياض',
            'name_en'=>'الرياض',
        ]);
        DropDown::create([
            'class'=>'City',
            'name_ar'=>'جدة',
            'name_en'=>'جدة',
        ]);
        DropDown::create([
            'class'=>'City',
            'name_ar'=>'الدمام',
            'name_en'=>'الدمام',
        ]);
        DropDown::create([
            'class'=>'Country',
            'name_ar'=>'السعودية',
            'name_en'=>'السعودية',
        ]);
        DropDown::create([
            'class'=>'Country',
            'name_ar'=>'اليمنية',
            'name_en'=>'اليمنية',
        ]);
        DropDown::create([
            'class'=>'Country',
            'name_ar'=>'المصرية',
            'name_en'=>'المصرية',
        ]);
    }
}
