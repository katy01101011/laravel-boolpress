<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $post = new Post();
            $post->title = $faker->sentence();
            $post->content = $faker->paragraph(rand(10, 30), false);
            // Genero slug
            $post->slug = Post::generateSlug($post->title);
            // Salvo
            $post->save();
        }
    }
}
