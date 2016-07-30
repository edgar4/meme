<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Reaction;
class reactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reactions')->truncate();

        $likes = array('Like','Love','Haha','Wow','Cool','Confused ','Sad','Angry ',);

        foreach($likes as $like){
            Reaction::create([
                'name' => $like,

            ]);
        }

    }
}
