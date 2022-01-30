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
            'initiator' => Arr::random(['СВ', 'ЕА', 'ДК', 'ЮВ', 'ЮЮ', 'Барнаул', 'Новосибирск', 'РБ', 'АА', 'Архангельск', 'Ярославль']),
            'type' => Arr::random(config('loanproduct')),
            'amount' => Arr::random([100, 500, 50, 10, 5, 1000, 1500, 300, 800, 210, 250, 2500, 1800, 1400, 900, 60, 75, 43, 700]),
            'zs' => Arr::random([null, 1]),
            'pathZS' => Arr::random([$faker->filePath(), null]),
            'pd' => Arr::random([null, 1]),
            'pathPD' => Arr::random([$faker->filePath(), null]),
            'ukk' => Arr::random([null, 1]),
            'pathUKK' => Arr::random([$faker->filePath(), null]),
            'iab' => Arr::random([null, 1]),
            'pathIAB' => Arr::random([$faker->filePath(), null]),
            'creator' => Arr::random(['Николай Емельяненко', 'Юлия Будкевич', 'Мария Иванова', 'Дмитрий Кузнецов', 'Владлена Руденко', 'Анна Усенкова']),
            'description' => Arr::random([null, $faker->realText(rand(100, 500))]),
            'created_at' => $faker->dateTimeBetween('-3 months', '-1 days'),
            'deleted_at' => null,
        ];
    }
}
