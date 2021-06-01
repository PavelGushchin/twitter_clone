<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'birth_date' => $this->faker->date(),
            'avatar' => null,
            'bio' => $this->faker->realText(),
            'location' => $this->faker->city,
            'website' => 'https://' . $this->faker->domainName,
        ];
    }
}