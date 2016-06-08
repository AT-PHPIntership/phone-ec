<?php

use Illuminate\Database\Seeder;

class GroupPermisstionsTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		for ($i = 1; $i < 10; $i++) {
			DB::table('group_permissions')->insert([
				'permission_id' => $i,
				'group_id' => 1
			]);
		}
	}
}
