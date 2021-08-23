<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'roles',
            'guard_name'=>'admin',
            'slug'=>'إدارة الصلاحيات'
        ]);
        Permission::create([
            'name'=>'admins',
            'guard_name'=>'admin',
            'slug'=>'إدارة أعضاء الإدارة'
        ]);
        Permission::create([
            'name'=>'users',
            'guard_name'=>'admin',
            'slug'=>'إدارة المستخدمين'
        ]);
        Permission::create([
            'name'=>'providers',
            'guard_name'=>'admin',
            'slug'=>'إدارة مزودي الخدمات'
        ]);
        Permission::create([
            'name'=>'categories',
            'guard_name'=>'admin',
            'slug'=>'إدارة التصنيفات'
        ]);

        Permission::create([
            'name'=>'notifications',
            'guard_name'=>'admin',
            'slug'=>'إدارة الإشعارات الجماعية'
        ]);
        Permission::create([
            'name'=>'package_users',
            'guard_name'=>'admin',
            'slug'=>'ادارة اشتراكات مقدمي الخدمات'
        ]);
        Permission::create([
            'name'=>'transfers',
            'guard_name'=>'admin',
            'slug'=>'ادارة نسبة التطبيق للمستخدمين'
        ]);
        Permission::create([
            'name'=>'contacts',
            'guard_name'=>'admin',
            'slug'=>'إدارة رسائل الأعضاء'
        ]);
        Permission::create([
            'name'=>'settings',
            'guard_name'=>'admin',
            'slug'=>'إدارة الإعدادات العامة'
        ]);
        Permission::create([
            'name'=>'pages',
            'guard_name'=>'admin',
            'slug'=>'إدارة الصفحات التعريفية'
        ]);
        Permission::create([
            'name'=>'banks',
            'guard_name'=>'admin',
            'slug'=>'إدارة الحسابات البنكية'
        ]);

        Permission::create([
            'name'=>'sliders',
            'guard_name'=>'admin',
            'slug'=>'إدارة الإعلانات'
        ]);
        Permission::create([
            'name'=>'packages',
            'guard_name'=>'admin',
            'slug'=>'إدارة الباقات'
        ]);
        Permission::create([
            'name'=>'promo_codes',
            'guard_name'=>'admin',
            'slug'=>'إدارة كوبونات الخصم'
        ]);
    }
}
