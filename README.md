# 🎓 SIGAP - Smart Education Platform
*(Proyek MVP untuk Hackathon IT Comp 2026 — Tema Smart Nation Innovation)*

SIGAP adalah platform edukasi cerdas berbasis AI yang berfokus pada **Adaptive Learning**. Sistem ini mengevaluasi kemampuan siswa (Learner) secara real-time dan memberikan *personalized learning path* menggunakan AI (Claude/OpenAI), serta menyediakan *dashboard monitoring* komprehensif bagi pengajar (Teacher).

---

## 🚀 Fitur Utama (Golden Path MVP)

### 📱 1. Mobile App (Untuk Siswa / Learner)
Dibangun menggunakan **Flutter**, fokus pada interaksi belajar yang responsif:
- **Dashboard & Intelligence Score:** Ringkasan skor kemampuan siswa dan insight belajar terbaru dari AI.
- **Competency Map:** Visualisasi *progress bar* untuk tiap topik materi (contoh: Looping, Array, Fungsi).
- **Adaptive Assessment:** Mesin kuis pintar. Jika siswa menjawab benar, level kesulitan soal (Level 1-5) akan naik, jika salah akan turun. Disertai penjelasan instan tiap jawaban.
- **AI Recommendation Center:** AI menganalisis data historis untuk memberikan rekomendasi prioritas belajar (misal: "Fokus ke Array, estimasi 20 menit").
- **AI Tutor:** Chatbot 2-arah untuk mendiskusikan materi pelajaran yang belum dipahami secara spesifik.

### 🧑‍🏫 2. Web Admin (Untuk Guru / Teacher)
Dibangun menggunakan **Laravel 11 & Blade (Tailwind CSS)**:
- **Teacher Dashboard:** Daftar urut seluruh siswa berdasarkan *Mastery Score*. Siswa yang tertinggal (skor < 50%) ditandai merah agar segera dibantu.
- **Student Analytics (Rapor):** Tampilan mendetail peta kompetensi per siswa, melihat seberapa sering mereka mengambil tes dan area kelemahan spesifik.

---

## 🛠️ Tech Stack

- **Backend & Web Admin:** Laravel 11, PHP 8.4
- **Database:** MySQL / PostgreSQL
- **Mobile App:** Flutter 3.x (Dart)
- **AI Engine:** Claude / OpenAI API (Untuk insight, tutor, dan rekomendasi)
- **Styling Web:** Tailwind CSS

---

## 📂 Struktur Proyek

Proyek ini adalah sistem **Monorepo**, memuat Backend dan Frontend di satu tempat untuk mempermudah pengerjaan selama Hackathon:

```text
SIGAP/
├── app/                  # Logika Backend Laravel (Controllers, Models, AI Logic)
├── database/             # Migrasi DB & Dummy Seeder Data
├── resources/views/      # Tampilan UI Web Admin (Guru)
├── routes/               # Routing API (Siswa) & Web (Guru)
│
└── sigap_mobile/         # 📱 KODE FLUTTER MOBILE APP ADA DI SINI
    ├── lib/
    │   ├── main.dart             # Entry point aplikasi mobile
    │   ├── screens/              # UI Utama (Login, Dashboard, Test, dll)
    │   └── services/             # Koneksi HTTP (api_service.dart) ke Laravel
    └── pubspec.yaml
```

---

## ⚙️ Cara Menjalankan Aplikasi di Komputer Lokal (Localhost)

Pastikan Anda telah menginstall: **PHP 8.2+**, **Composer**, **MySQL (Laragon/XAMPP)**, dan **Flutter SDK**.

### Langkah 1: Setup Backend (Laravel)
1. Buka terminal di folder root (`SIGAP/`).
2. Install dependensi PHP:
   ```bash
   composer install
   ```
3. Copy `.env.example` menjadi `.env` (atau pastikan `.env` sudah ada dan koneksi DB `DB_DATABASE=sigap_db` sudah benar).
4. Generate key aplikasi:
   ```bash
   php artisan key:generate
   ```
5. Jalankan Migrasi & Data Dummy (Sangat Penting untuk Demo!):
   ```bash
   php artisan migrate:fresh --seed
   ```
   *(Ini akan membuatkan 3 akun Siswa dan 1 akun Guru, beserta 75 soal tes).*
6. Nyalakan Server API Laravel:
   ```bash
   php artisan serve --port=8000
   ```
   *Biarkan terminal ini tetap terbuka.*

### Langkah 2: Setup Frontend (Flutter Mobile App)
1. Buka **terminal baru**, lalu masuk ke folder mobile:
   ```bash
   cd sigap_mobile
   ```
2. Download paket Flutter:
   ```bash
   flutter pub get
   ```
3. Jalankan aplikasi (Disarankan menggunakan emulator Windows untuk kecepatan demo, atau Emulator Android):
   ```bash
   flutter run -d windows
   ```

---

## 🔐 Akun Dummy untuk Demo

**Portal Guru (Web - Buka di Browser: `http://127.0.0.1:8000/teacher/login`)**
- Email: `teacher@demo.com`
- Password: `password`

**Aplikasi Siswa (Mobile - Buka di Flutter)**
- Email: `andi@demo.com` (Siswa Rata-rata)
- Email: `sari@demo.com` (Siswa Lemah - Butuh Perhatian)
- Password: `password`

---

## 🤖 Integrasi AI (Opsional)
Secara default sistem berjalan menggunakan balasan teks simulasi (dummy). Untuk mengaktifkan kecerdasan buatan sungguhan, tambahkan kunci API Anda di file `.env` Laravel:
```env
OPENAI_API_KEY="sk-kunci-anda"
CLAUDE_API_KEY="sk-ant-kunci-anda"
```

---
*Dibuat dengan ❤️ untuk Hackathon IT Comp 2026*
