<?php

use Illuminate\Database\Seeder;

class AdminGroupTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		for ($i = 1; $i < 10; $i++) { 
			DB::table('admin_groups')->insert([
				'group_id' => 1,
				'admin_id' => $i,
			]);
		}
	}
}
