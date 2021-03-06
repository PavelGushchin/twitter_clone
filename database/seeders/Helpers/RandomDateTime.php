<?php

namespace Database\Seeders\Helpers;

use Faker;
use Illuminate\Support\Carbon;

class RandomDateTime
{
    protected static $faker;

    /**
     * @param string|Carbon $startDate
     * @return Carbon
     */
    public static function generate($startDate = '-3 years')
    {
        if (self::$faker == null) {
            self::$faker = Faker\Factory::create();
        }

        if ($startDate instanceof Carbon) {
            $randomDate = $startDate;
            $randomDate->addHours(self::$faker->numberBetween(1, 24));
        } else {
            $randomDate = Carbon::make(self::$faker->dateTimeBetween($startDate));
        }

        $randomDate->setMinutes(self::$faker->numberBetween(0, 59));
        $randomDate->setSeconds(self::$faker->numberBetween(0, 59));

        if ($randomDate->gt(Carbon::now())) {
            $randomDate = Carbon::now();
        }

        return $randomDate;
    }
}
