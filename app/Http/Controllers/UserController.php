<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function intelligence()
    {
        $insights = [
            [
                'title' => 'Kompetensi Perulangan membutuhkan penguatan',
                'description' => 'Penguasaan materi Anda meningkat 18% dalam 3 minggu terakhir, tetapi kompetensi Perulangan masih berada di bawah target.',
                'time' => 'Hari ini · 09:10',
                'priority' => 'Tinggi',
                'trend' => '+18%',
                'icon' => '🧠',
                'tone' => 'bg-violet-50 border-violet-200 text-violet-800',
                'badge' => 'AI Insight',
            ],
            [
                'title' => 'Pola aktivitas belajar Anda cukup konsisten',
                'description' => 'Frekuensi belajar mulai stabil dan Anda lebih sering mengerjakan latihan interaktif di akhir pekan.',
                'time' => 'Kemarin · 17:45',
                'priority' => 'Sedang',
                'trend' => '+7%',
                'icon' => '📈',
                'tone' => 'bg-emerald-50 border-emerald-200 text-emerald-800',
                'badge' => 'Trend',
            ],
            [
                'title' => 'Terdapat peningkatan laporan fasilitas di wilayah sekitar',
                'description' => 'Kebutuhan layanan publik Anda menunjukkan pola yang meningkat, terutama di sekitar administrasi dan fasilitas umum.',
                'time' => '2 hari lalu · 10:15',
                'priority' => 'Perhatian',
                'trend' => '+12%',
                'icon' => '🏙️',
                'tone' => 'bg-amber-50 border-amber-200 text-amber-800',
                'badge' => 'Smart City',
            ],
        ];

        return view('user.intelligence.index', compact('insights'));
    }

    public function intelligenceDetail()
    {
        $factors = [
            'Frekuensi latihan menurun 18% pada minggu lalu.',
            'Latihan soal perulangan memiliki rata-rata penyelesaian 62%.',
            'Waktu belajar paling efektif Anda berada pada malam hari.',
        ];

        return view('user.intelligence.detail', compact('factors'));
    }

    public function recommendations()
    {
        $items = [
            [
                'title' => 'Pelajari Array dan List',
                'category' => 'Education',
                'priority' => 'Tinggi',
                'time' => '30 menit',
                'reason' => 'Kompetensi Array masih berada di bawah target berdasarkan hasil assesment terakhir.',
                'button' => 'Mulai',
                'tone' => 'bg-blue-50 border-blue-200 text-blue-800',
            ],
            [
                'title' => 'Administrasi Kependudukan',
                'category' => 'Layanan',
                'priority' => 'Sedang',
                'time' => '15 menit',
                'reason' => 'Berdasarkan kebutuhan Anda, layanan ini paling relevan untuk diselesaikan hari ini.',
                'button' => 'Lihat Panduan',
                'tone' => 'bg-amber-50 border-amber-200 text-amber-800',
            ],
            [
                'title' => 'Tanya AI Tutor',
                'category' => 'Personal',
                'priority' => 'Rendah',
                'time' => '10 menit',
                'reason' => 'Anda masih bingung pada konsep nested loop dan butuh penjelasan sederhana.',
                'button' => 'Buka Tutor',
                'tone' => 'bg-violet-50 border-violet-200 text-violet-800',
            ],
        ];

        return view('user.recommendations.index', compact('items'));
    }

    public function recommendationDetail()
    {
        return view('user.recommendations.detail');
    }

    public function activities()
    {
        $items = [
            ['date' => '28 Sep', 'type' => 'Belajar', 'title' => 'Menyelesaikan latihan Array & List', 'description' => 'Score: 90% • 28 menit', 'icon' => '✅'],
            ['date' => '27 Sep', 'type' => 'Assessment', 'title' => 'Mengerjakan assessment terakhir', 'description' => 'Topik: Perulangan dasar', 'icon' => '📝'],
            ['date' => '26 Sep', 'type' => 'Laporan', 'title' => 'Mengirim laporan lampu jalan mati', 'description' => 'Lokasi: Jl. Raya Subang', 'icon' => '📍'],
            ['date' => '25 Sep', 'type' => 'Sistem', 'title' => 'AI Tutor memberikan materi rekomendasi baru', 'description' => 'Topik: Nested loop', 'icon' => '🤖'],
        ];

        return view('user.activities.index', compact('items'));
    }

    public function notifications()
    {
        $items = [
            ['title' => 'Rekomendasi baru tersedia', 'type' => 'Recommendation', 'summary' => 'SIGAP menemukan materi perulangan yang relevan untuk Anda hari ini.', 'time' => 'Baru saja', 'read' => false],
            ['title' => 'Laporan Anda sedang diproses', 'type' => 'Report', 'summary' => 'Laporan lampu jalan mati dengan ID #SIGAP10291 masuk tahap verifikasi.', 'time' => '1 jam lalu', 'read' => false],
            ['title' => 'Insight AI: Kompetensi Perulangan', 'type' => 'AI Insight', 'summary' => 'Anda membutuhkan penguatan kecil untuk mencapai target 80%.', 'time' => 'Kemarin', 'read' => true],
            ['title' => 'Sesi AI Tutor selesai', 'type' => 'System', 'summary' => 'Riwayat sesi Anda berhasil disimpan.', 'time' => '3 hari lalu', 'read' => true],
        ];

        return view('user.notifications.index', compact('items'));
    }

    public function profile()
    {
        $profile = [
            'name' => 'Adhwaa',
            'email' => 'adhwaa@example.com',
            'role' => 'Citizen / Learner',
            'institution' => 'SIGAP Academy',
            'location' => 'Subang, Jawa Barat',
            'focus' => 'Pemrograman Dasar',
            'memberSince' => 'Januari 2026',
            'badges' => ['AI Learner', 'Smart City User', 'Fast Learner'],
            'stats' => [
                ['label' => 'Progress', 'value' => '78%'],
                ['label' => 'Streak', 'value' => '12 hari'],
                ['label' => 'Laporan', 'value' => '04'],
            ],
        ];

        return view('user.profile.index', compact('profile'));
    }

    public function settings()
    {
        $sections = [
            ['label' => 'Profil pribadi', 'value' => 'Nama, kontak, dan lokasi'],
            ['label' => 'Notifikasi', 'value' => 'Atur reminder dan pengingat belajar'],
            ['label' => 'Keamanan', 'value' => 'Password dan autentikasi akun'],
            ['label' => 'Preferensi', 'value' => 'Tema dashboard, bahasa, dan layout'],
        ];

        return view('user.settings.index', compact('sections'));
    }

    public function settingsPrivacy()
    {
        $items = [
            ['label' => 'Penggunaan data', 'value' => 'Data personal digunakan untuk personalisasi rekomendasi'],
            ['label' => 'Lokasi', 'value' => 'Diaktifkan untuk layanan smart city'],
            ['label' => 'AI Personalization', 'value' => 'Dapat membantu membuat insight yang lebih relevan'],
        ];

        return view('user.settings.privacy', compact('items'));
    }

    public function settingsSecurity()
    {
        $items = [
            ['label' => 'Ubah password', 'value' => 'Terakhir diperbarui 2 bulan lalu'],
            ['label' => 'Session aktif', 'value' => '3 perangkat terhubung'],
            ['label' => 'Logout semua perangkat', 'value' => 'Jaga akun tetap aman'],
        ];

        return view('user.settings.security', compact('items'));
    }

    public function education()
    {
        $stats = [
            ['label' => 'Kompetensi aktif', 'value' => '05'],
            ['label' => 'Modul selesai', 'value' => '12'],
            ['label' => 'Target minggu ini', 'value' => '3 sesi'],
        ];

        $courses = [
            ['title' => 'Pemrograman Dasar', 'level' => 'Level 1', 'progress' => 72, 'next' => 'Array & List'],
            ['title' => 'Logika & Percabangan', 'level' => 'Level 2', 'progress' => 58, 'next' => 'If Else Multi Kondisi'],
            ['title' => 'Perulangan & Looping', 'level' => 'Level 3', 'progress' => 41, 'next' => 'Nested Loop'],
        ];

        return view('user.education.competency', compact('stats', 'courses'));
    }

    public function educationLearningPath()
    {
        $path = [
            ['title' => 'Algoritma Dasar', 'status' => 'done'],
            ['title' => 'Percabangan', 'status' => 'done'],
            ['title' => 'Perulangan', 'status' => 'active'],
            ['title' => 'Array', 'status' => 'locked'],
            ['title' => 'Sorting', 'status' => 'locked'],
        ];

        return view('user.education.learning-path', compact('path'));
    }

    public function educationAssessment()
    {
        $questions = [
            ['id' => 1, 'question' => 'Apa fungsi dari perulangan dalam program?', 'options' => ['Mengulang blok kode', 'Menyimpan data', 'Membuat variabel baru', 'Menghapus file'], 'answer' => 'Mengulang blok kode'],
            ['id' => 2, 'question' => 'Mana yang merupakan struktur loop?', 'options' => ['if', 'for', 'switch', 'array'], 'answer' => 'for'],
        ];

        return view('user.education.assessment', compact('questions'));
    }

    public function educationAiTutor()
    {
        $messages = [
            ['from' => 'user', 'text' => 'Aku masih bingung tentang perulangan.'],
            ['from' => 'ai', 'text' => 'Aku bisa membantu. Berdasarkan hasil belajarmu, kamu sudah memahami kondisi dasar. Perulangan dipakai untuk mengulang proses secara berulang.'],
        ];

        return view('user.education.ai-tutor', compact('messages'));
    }

    public function educationDetail()
    {
        $course = [
            'title' => 'Perulangan & Looping',
            'progress' => 41,
            'summary' => 'Modul ini membahas dasar loop, kondisi penghentian, dan pola iterasi yang umum digunakan dalam program.',
            'objectives' => ['Memahami struktur for dan while', 'Menghindari infinite loop', 'Menerapkan loop untuk data berulang'],
        ];

        return view('user.education.detail', compact('course'));
    }

    public function city()
    {
        $highlights = [
            ['title' => 'Layanan publik', 'value' => '08', 'meta' => 'Tersedia hari ini'],
            ['title' => 'Laporan aktif', 'value' => '04', 'meta' => '2 butuh verifikasi'],
            ['title' => 'Wilayah fokus', 'value' => 'Subang', 'meta' => 'Kecamatan pusat'],
        ];

        $reports = [
            ['title' => 'Lampu jalan mati', 'status' => 'Diproses', 'priority' => 'Tinggi', 'location' => 'Jl. Raya Subang'],
            ['title' => 'Saluran air tersumbat', 'status' => 'Diverifikasi', 'priority' => 'Sedang', 'location' => 'Pasar Kaget'],
            ['title' => 'Fasilitas pendidikan', 'status' => 'Selesai', 'priority' => 'Rendah', 'location' => 'SMK 2 Subang'],
        ];

        return view('user.city.map', compact('highlights', 'reports'));
    }

    public function cityReport()
    {
        $items = [
            ['title' => 'Lampu jalan mati', 'category' => 'Jalan', 'status' => 'Diproses', 'priority' => 'Tinggi'],
            ['title' => 'Sampah menumpuk', 'category' => 'Sampah', 'status' => 'Diverifikasi', 'priority' => 'Sedang'],
        ];

        return view('user.city.report', compact('items'));
    }

    public function cityReportDetail()
    {
        $report = [
            'title' => 'Lampu Jalan Mati',
            'status' => 'Diproses',
            'priority' => 'Tinggi',
            'location' => 'Jl. Raya Subang, RT 02/RW 05',
            'description' => 'Lampu jalan pada area depan pasar mulai redup dan beberapa titik sudah mati sepenuhnya sejak 2 hari terakhir.',
            'timeline' => ['Laporan diterima', 'Verifikasi petugas', 'Penyelesaian sedang dikerjakan'],
        ];

        return view('user.city.report-detail', compact('report'));
    }

    public function cityPublicService()
    {
        $services = [
            ['title' => 'Pembuatan KTP', 'requirements' => ['Kartu keluarga', 'KTP lama', 'Fotokopi KK'], 'location' => 'Kantor Camat Subang', 'hours' => '08:00 - 15:00'],
            ['title' => 'Pelayanan Kesehatan', 'requirements' => ['Kartu BPJS', 'KTP'], 'location' => 'Puskesmas Kota', 'hours' => '07:30 - 14:00'],
        ];

        return view('user.city.public-service', compact('services'));
    }

    public function cityDetail()
    {
        return $this->cityReportDetail();
    }
}
