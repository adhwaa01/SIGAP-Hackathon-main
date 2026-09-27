<?php

namespace Database\Seeders;

use App\Models\LearningProgress;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        $demoAccounts = [
            ['name' => 'Andi Pratama', 'email' => 'andi@demo.com', 'password' => 'password', 'role' => 'learner'],
            ['name' => 'User Demo', 'email' => 'user@demo.com', 'password' => 'password', 'role' => 'user'],
            ['name' => 'Bu Rini Wulandari', 'email' => 'teacher@demo.com', 'password' => 'password', 'role' => 'teacher'],
            ['name' => 'Mentor Demo', 'email' => 'mentor@demo.com', 'password' => 'password', 'role' => 'mentor'],
            ['name' => 'Petugas Demo', 'email' => 'officer@demo.com', 'password' => 'password', 'role' => 'officer'],
            ['name' => 'Admin Institusi', 'email' => 'institution@demo.com', 'password' => 'password', 'role' => 'institution'],
            ['name' => 'System Admin', 'email' => 'admin@demo.com', 'password' => 'password', 'role' => 'admin'],
        ];

        foreach ($demoAccounts as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                [
                    'name' => $account['name'],
                    'password' => Hash::make($account['password']),
                    'role' => $account['role'],
                ]
            );
        }

        // ── Demo Learner (punya progress bervariasi, untuk demo) ─────────
        $learner = User::where('email', 'andi@demo.com')->first();

        // Setup progress untuk demo: Array & Loop lemah, Variabel kuat
        $progressData = [
            1 => 85,  // Variabel & Tipe Data - kuat
            2 => 72,  // Struktur Kontrol - cukup
            3 => 45,  // Perulangan - lemah
            4 => 60,  // Fungsi - cukup
            5 => 30,  // Array - sangat lemah (untuk demo recommendation)
        ];

        foreach ($progressData as $competencyId => $masteryLevel) {
            LearningProgress::create([
                'user_id'          => $learner->id,
                'competency_id'    => $competencyId,
                'mastery_level'    => $masteryLevel,
                'assessment_count' => rand(2, 5),
                'last_assessed_at' => now()->subDays(rand(1, 7)),
            ]);
        }

        // ── Demo Learner 2 (untuk tampilan teacher dashboard) ───────────
        $learner2 = User::create([
            'name'     => 'Sari Dewi',
            'email'    => 'sari@demo.com',
            'password' => Hash::make('password'),
            'role'     => 'learner',
        ]);

        $progressData2 = [
            1 => 40, 2 => 35, 3 => 28, 4 => 45, 5 => 20,
        ];
        foreach ($progressData2 as $competencyId => $masteryLevel) {
            LearningProgress::create([
                'user_id'          => $learner2->id,
                'competency_id'    => $competencyId,
                'mastery_level'    => $masteryLevel,
                'assessment_count' => rand(1, 3),
                'last_assessed_at' => now()->subDays(rand(2, 10)),
            ]);
        }

        // ── Demo Learner 3 ───────────────────────────────────────────────
        $learner3 = User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@demo.com',
            'password' => Hash::make('password'),
            'role'     => 'learner',
        ]);

        $progressData3 = [
            1 => 92, 2 => 88, 3 => 80, 4 => 75, 5 => 70,
        ];
        foreach ($progressData3 as $competencyId => $masteryLevel) {
            LearningProgress::create([
                'user_id'          => $learner3->id,
                'competency_id'    => $competencyId,
                'mastery_level'    => $masteryLevel,
                'assessment_count' => rand(5, 10),
                'last_assessed_at' => now()->subDays(rand(1, 3)),
            ]);
        }

        $this->command->info('✅ Demo users created:');
        $this->command->info('   Learner:      andi@demo.com          / password');
        $this->command->info('   User:         user@demo.com          / password');
        $this->command->info('   Teacher:      teacher@demo.com       / password');
        $this->command->info('   Mentor:       mentor@demo.com        / password');
        $this->command->info('   Officer:      officer@demo.com       / password');
        $this->command->info('   Institution:  institution@demo.com   / password');
        $this->command->info('   Admin:        admin@demo.com         / password');
        $this->command->info('   Learner2:     sari@demo.com          / password');
        $this->command->info('   Learner3:     budi@demo.com          / password');
    }
}
