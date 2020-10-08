<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(['Framework', 'Code', 'Stayle', 'Component']);
        $categories->each(function ($c) {
            \App\Category::create([
                'title' => $c,
                'slug' => \Str::slug($c),
            ]);
        });
    }
}
