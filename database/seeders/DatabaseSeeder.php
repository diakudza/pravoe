<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Factories\TestUserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            UserSeeder::class
        ]);

        User::factory()->create([
            'name' => 'client',
            'email' => 'client@test.com',
            'role_id' => function () {
                return Role::where('title', '=', 'Клиент')->first();
            },
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'lawyer',
            'email' => 'lawyer@test.com',
            'role_id' => function () {
                return Role::where('title', '=', 'Юрист')->first();
            },
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'lawyer2',
            'email' => 'lawyer2@test.com',
            'role_id' => function () {
                return Role::where('title', '=', 'Юрист')->first();
            },
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $this->call(ProposalSeeder::class);
//        $this->call(CommentSeeder::class);

    }
}
