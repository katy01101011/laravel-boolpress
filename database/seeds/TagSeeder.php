<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'Vegetariano',
            'Vegano',
            'Senza glutine',
            'Light',
            'Veloce',
            'Tradizionale',
            'Etnico',
        ];

        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Post::generateSlug($tag);
            $new_tag->save();
        }
    }
}

?>