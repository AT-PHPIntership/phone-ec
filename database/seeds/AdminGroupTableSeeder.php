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
    	$limit = 10;
    	for ($i=1; $i < $limit ; $i++) { 
    		DB::table('admin_groups')->insert([
	        	'group_id' => 1,
	        	'admin_id' => $i,
	        ]);
    	}
    }
}
