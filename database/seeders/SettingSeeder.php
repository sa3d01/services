<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'type'=>'terms',
            'for'=>'user',
            'title_ar'=>'الشروط والأحكام',
            'title_en'=>'الشروط والأحكام',
            'note_ar'=>'الشروط والأحكام للمستخدم',
            'note_en'=>'الشروط والأحكام للمستخدم',
        ]);
        Page::create([
            'type'=>'terms',
            'for'=>'provider',
            'title_ar'=>'الشروط والأحكام',
            'title_en'=>'الشروط والأحكام',
            'note_ar'=>'الشروط والأحكام لمقدم الخدمه',
            'note_en'=>'الشروط والأحكام لمقدم الخدمه',
        ]);
        Page::create([
            'type'=>'about',
            'for'=>'all',
            'title_ar'=>'عن التطبيق',
            'title_en'=>'عن التطبيق',
            'note_ar'=>'نص عن التطبيق',
            'note_en'=>'نص عن التطبيق',
        ]);
        Page::create([
            'type'=>'percent',
            'for'=>'all',
            'title_ar'=>'عمولة التطبيق',
            'title_en'=>'عمولة التطبيق',
            'note_en'=>'نص عن عمولة التطبيق',
        ]);
        Setting::create([
            'mobile'=>'+9665xxxxxxxx',
            'email'=>'info@services.com',
            'app_ratio'=>5,
        ]);
    }
}
