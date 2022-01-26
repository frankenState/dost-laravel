<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        $post = new Post();
        $post->user_id = 4;
        $post->title = 'A post from the seeder';
        $post->body = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!';
        $post->save();
        
    }
}
