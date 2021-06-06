<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Category;
use App\Models\DropDown;
use App\Models\Package;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name_ar'=>'البنك الآهلي',
            'name_en'=>'alahly',
            'account_number'=>'235234634745645236'
        ]);
        Bank::create([
            'name_ar'=>'البنك الراجحي',
            'name_en'=>'alraghy',
            'account_number'=>'584573456346534574567'
        ]);
    }
}
