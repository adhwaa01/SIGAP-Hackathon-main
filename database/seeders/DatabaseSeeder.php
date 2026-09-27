<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CompetencySeeder::class, // 5 kompetensi + 75 soal (15 per kompetensi)
            DemoUserSeeder::class,   // akun demo: learner, teacher, dll
        ]);
    }
}
