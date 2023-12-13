<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminMenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_menu_items')->insert([
            [
                'menu_name' => 'Users',
                'route_name' => 'users',
                'data_feather' => 'meh',
                'order' => '1'
            ]
            ]);
    }
}
