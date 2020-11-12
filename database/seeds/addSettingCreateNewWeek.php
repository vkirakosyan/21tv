<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class addSettingCreateNewWeek extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
        	'satting_name' => 'create_new_week',
        	'satting_value' => Carbon::now()->subWeek()->endOfWeek()]);
    }
}
