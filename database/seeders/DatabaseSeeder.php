<?php

namespace Database\Seeders;

use App\Models\{Factory, Shop, User, Farm};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Farm::factory(20)->create();
        Factory::factory(27)
            ->has(Farm::factory(3))
            ->create();
        Shop::factory(34)
            ->has(Factory::factory(5))
            ->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
    }
}
