<?php

use Illuminate\Database\Seeder;

class AddBlogPage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert(
            [
                [
                    'title' => 'Blog',
                    'titleH1' => 'Blog',
                    'description' => 'Blog',
                    'text' => 'Blog',
                    'alias' => 'blog'
                ]

            ]
        );
    }
}
