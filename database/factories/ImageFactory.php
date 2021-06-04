<?php

namespace Database\Factories;

use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filename' => '',
            'description' => $this->faker->sentence,
            'created_at' => Carbon::now()->subDays(rand(0, 365)),
        ];
    }
}
