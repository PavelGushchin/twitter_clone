<?php

namespace Database\Factories;

use App\Models\Tweet;
use App\Models\User;
use Database\Factories\Traits\RandomDateTime;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TweetFactory extends Factory
{
    use RandomDateTime;

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
            'created_at' => $this->randomDateTime(),
        ];
    }
}
