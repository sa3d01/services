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
    }
}
