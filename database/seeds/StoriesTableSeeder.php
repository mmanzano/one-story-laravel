<?php

use App\Character;
use App\Story;
use Illuminate\Database\Seeder;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Story::class, 30)->create()->each(function ($story) {
            return factory(Character::class, 2)->create([
                'story_id' => $story->id,
            ]);
        });
    }
}
