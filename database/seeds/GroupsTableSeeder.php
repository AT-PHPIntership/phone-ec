<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		DB::table('groups')->insert([
			'name' => 'Admin Group'
		]);

		DB::table('groups')->insert([
			'name' => 'User Group'
		]);
	}
}
