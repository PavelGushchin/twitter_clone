<?php

namespace Database\Factories;

use App\Models\Image;
use Carbon\Carbon;
use Database\Seeders\Helpers\RandomDateTime;
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
        ];
    }
}
