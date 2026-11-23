<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Budi',
            'email' => 'budi@flipplay.test',
        ]);

        User::factory()->create([
            'name' => 'Siti',
            'email' => 'siti@flipplay.test',
        ]);
    }
}
