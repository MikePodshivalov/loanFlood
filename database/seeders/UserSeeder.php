<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    private array $users = [
        [
            'name' => 'Николай Емельяненко',
            'email' => 'naemelyanenko@gmail.com',
            'role' => 'ukk_main'
        ],
        [
            'name' => 'Михаил Подшивалов',
            'email' => 'mapodshivalov@gmail.comm',
            'role' => 'ukk'
        ],
        [
            'name' => 'Елена Волкова',
            'email' => 'eavolkova@gmail.com',
            'role' => 'km_main'
        ],
        [
            'name' => 'Анна Усенкова',
            'email' => 'aeusenkova@gmail.com',
            'role' => 'km'
        ],
        [
            'name' => 'Максим Подвинцев',
            'email' => 'mlpodvincev@gmail.com',
            'role' => 'pd_main'
        ],
        [
            'name' => 'Александра Лысенко',
            'email' => 'aalysenko@gmail.com',
            'role' => 'pd'
        ],
        [
            'name' => 'Тенгиз Будаев',
            'email' => 'tnbudaev@gmail.com',
            'role' => 'zs_main'
        ],
        [
            'name' => 'Вадим Никифоров',
            'email' => 'vanikiforov@gmail.com',
            'role' => 'zs'
        ],
        [
            'name' => 'Юрий Паламарчук',
            'email' => 'uvpalamarchuk@gmail.com',
            'role' => 'iab_main'
        ],
        [
            'name' => 'Иван Иванов',
            'email' => 'iiivanod@gmail.com',
            'role' => 'iab'
        ],
        [
            'name' => 'Степан Иноземцев',
            'email' => 'svinozemcev@gmail.com',
            'role' => 'ukk'
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsers();
    }

    private function createUsers()
    {
        foreach ($this->users as $user) {
            $userCreated = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make('mixa1234'),
                'remember_token' => Str::random(10),
            ]);
            $userCreated->assignRole($user['role']);
        }
    }
}
