<?php

namespace Database\Seeders;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<5;$i++){
            Slider::create([
                'start_date'=>Carbon::now()->format('Y-m-d'),
                'end_date'=>Carbon::now()->addDays(70)->format('Y-m-d'),
                'title_ar'=>'عنوان',
                'title_en'=>'title',
                'note_ar'=>'تفاصيل',
                'note_en'=>'note',
                'image'=>'default.png',
            ]);
        }
    }
}
