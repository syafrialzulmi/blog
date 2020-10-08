<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect(['HTML', 'PHP', 'CSS', 'Bugs', 'Help', 'C++']);
        $tags->each(function ($c) {
            \App\Tag::create([
                'title' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
