<?php

use App\Post;
use Illuminate\Database\Seeder;
//tuk pi6em
class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class,12)->create()->each(function($post){
            //6te sazdade 12 postobekta
          $post->save();
        });
    }
}
