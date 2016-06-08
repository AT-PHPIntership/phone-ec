<?php
use Illuminate\Database\Seeder;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
        	['module' => 'Brands',      'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Products',    'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Users',       'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Ratings',     'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Orders',      'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Accounts',    'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Contacts',    'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Permissions', 'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1],
        	['module' => 'Groups',      'see' => 1, 'insert' => 1, 'edit' => 1, 'destroy' => 1]
        ]);
    }
}
