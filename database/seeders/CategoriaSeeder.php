<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categoria::factory(6)->create();

        DB::table('categorias')->insert(
            [
                ['nombre' => fake()->text(10)],
                ['nombre' => fake()->text(10)],
                ['nombre' => fake()->text(10)],
                ['nombre' => fake()->text(10)],
                ['nombre' => fake()->text(10)]
            ]
        );
    }
}
