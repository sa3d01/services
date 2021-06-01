<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactType::create([
           'name_ar'=>'شكوي',
           'name_en'=>'report'
        ]);
        ContactType::create([
           'name_ar'=>'اقتراح',
           'name_en'=>'suggestion'
        ]);
    }
}
