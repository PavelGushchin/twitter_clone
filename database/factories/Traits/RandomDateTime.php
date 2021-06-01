<?php

namespace Database\Factories\Traits;

use Illuminate\Support\Carbon;

trait RandomDateTime
{
    public function randomDateTime()
    {
        $currentDate = new Carbon(now());

        $randomDate = new Carbon($this->faker->dateTime());
        $randomDate->setYear($currentDate->year);

        if ($randomDate > $currentDate) {
            $randomDate->setYear($currentDate->year - 1);
        }

        return $randomDate;
    }
}
