<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'name' => Arr::random(['ООО', 'АО', 'ПАО']) . ' "' . $faker->text(rand(5, 20)) . '"',
            'group' => Arr::random([null, Str::random(5)]),
            'inn' => Arr::random([rand(1000000000, 9999999999), rand(100000000000, 999999999999)]),
            'type' => Arr::random(['ВКЛ', 'НКЛ', 'БГ', 'ЛБГ', 'Разное']),
            'amount' => Arr::random([100000, 500000, 50000, 10000, 1000000, 1500000, 300000, 800000]),
            'pledge' => Arr::random([false, true]),
            'creator' => Arr::random(['eavolkova@gmail.com', 'ugbudkevich@gmail.com', 'maivanova@gmail.com',
                'dakuznecov@gmail.com', 'varudenko@gmail.com', 'aeusenkova@gmail.com', 'naemelynenko@gmail.com']),
            'description' => Arr::random([null, $faker->realText(rand(100, 500))]),
            'created_at' => $faker->dateTimeBetween('-3 months', '-1 days'),
        ];
    }
}
