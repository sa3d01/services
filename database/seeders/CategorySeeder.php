<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\DropDown;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name_ar'=>'سيارات',
            'name_en'=>'cars',
        ]);
        Category::create([
            'name_ar'=>'عقارات',
            'name_en'=>'buildings',
        ]);
        Category::create([
            'name_ar'=>'سباكة',
            'name_en'=>'sbaka',
        ]);


        Category::create([
            'name_ar'=>'غسيل',
            'name_en'=>'wash',
            'parent_id'=>1
        ]);
        Category::create([
            'name_ar'=>'صيانة',
            'name_en'=>'fix',
            'parent_id'=>1
        ]);

        Category::create([
            'name_ar'=>'بناء',
            'name_en'=>'build',
            'parent_id'=>2
        ]);
        Category::create([
            'name_ar'=>'تشطيب',
            'name_en'=>'finish',
            'parent_id'=>2
        ]);

        Category::create([
            'name_ar'=>'توريد',
            'name_en'=>'buy',
            'parent_id'=>3
        ]);
        Category::create([
            'name_ar'=>'تركيب',
            'name_en'=>'add',
            'parent_id'=>3
        ]);


    }
}
