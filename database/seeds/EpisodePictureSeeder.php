<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EpisodePictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('episodes')->where('video_url', null)->update(['status' => 'picture']);
    }
}
