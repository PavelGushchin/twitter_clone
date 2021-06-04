<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Tweet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ImageSeeder extends Seeder
{
    protected $fakeImages;

    public function __construct()
    {
        $this->fakeImages = collect(File::files(public_path('media/fake_tweets_images')))->map(function ($file) {
            return File::basename($file);
        });
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomTweets = Tweet::inRandomOrder()
            ->take(floor(Tweet::count() * 0.3))
            ->get();

        $randomTweets->map(function ($tweet) {
            $image = Image::factory()->create();

            $image->update([
                'filename' => 'fake_tweets_images/' . $this->fakeImages->random(),
            ]);

            $tweet->update([
                'mediable_id' => $image->id,
                'mediable_type' => 'image',
            ]);
        });
    }
}
