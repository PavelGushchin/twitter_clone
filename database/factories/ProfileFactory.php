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
            'avatar' => $this->generateAvatarUrl(),
            'bio' => $this->faker->realText(),
            'location' => $this->faker->city,
            'website' => 'https://' . $this->faker->domainName,
        ];
    }

    protected function generateAvatarUrl()
    {
        $hash = md5($this->faker->text);
        $set = $this->faker->numberBetween(0, 3);
        $bg = $this->faker->numberBetween(1,2);

        return 'https://robohash.org/' . $hash . '?set=set' . $set . '&bgset=bg' . $bg . '&size=200x200';
    }
}
