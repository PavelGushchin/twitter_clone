<?php

namespace Database\Factories;

use App\Models\Tweet;
use Database\Seeders\Helpers\RandomDateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tweet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'text' => $this->faker->realText(280),
            'created_at' => RandomDateTime::create(),
        ];
    }
}
