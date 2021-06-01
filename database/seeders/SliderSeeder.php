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
                'start_date'=>Carbon::now()->timestamp,
                'end_date'=>Carbon::now()->addDays(70)->timestamp,
                'title_ar'=>'عنوان',
                'title_en'=>'title',
                'note_ar'=>'تفاصيل',
                'note_en'=>'note',
                'image'=>'default.png',
            ]);
        }
    }
}
