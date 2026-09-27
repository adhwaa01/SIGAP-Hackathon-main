# SIGAP — Plan Fase 5: Finishing & Demo Prep
**Untuk instruksi ke Antigravity — lanjutan dari MVP yang sudah 100% selesai**

Status saat ini: Semua fitur inti (auth, adaptive assessment, AI insight, AI tutor, recommendation, teacher dashboard) sudah fungsional. AI masih pakai dummy text menunggu API key asli. Fase ini fokus pada finishing teknis dan persiapan demo — BUKAN menambah fitur baru.

---

## PRINSIP FASE INI

**Jangan tambah fitur baru.** Fokus: pastikan yang sudah ada benar-benar solid, tidak ada bug, dan siap didemokan live tanpa gagal.

---

## STEP 1 — Integrasi API Key AI Sungguhan

### 1.1 Setup Environment
- Tambahkan `OPENAI_API_KEY` atau `CLAUDE_API_KEY` ke file `.env` Laravel
- Pastikan `AiController` membaca key dari `config/services.php`, bukan hardcode di controller
- Tambahkan `.env.example` yang update (tanpa key asli) supaya aman kalau di-push ke repo

### 1.2 Ganti Dummy Text dengan Call API Asli
- Update method insight generation di `AiController` supaya benar-benar memanggil endpoint AI, bukan return string statis
- Update method chat tutor supaya kirim context (competency profile user) ke system prompt, sesuai desain awal

### 1.3 Tambahkan Error Handling & Fallback
- Bungkus semua call ke AI API dengan try-catch
- Kalau API gagal/timeout (misal lebih dari 10 detik), return fallback message yang tetap masuk akal, contoh:
  - Untuk insight: "Insight sedang diproses, coba refresh beberapa saat lagi."
  - Untuk chat tutor: "Maaf, AI Tutor sedang sibuk. Silakan coba lagi."
- JANGAN biarkan aplikasi crash atau blank screen kalau API gagal

### 1.4 Tambahkan Timeout & Loading State
- Set timeout request ke AI API maksimal 15 detik di sisi Laravel (`Http::timeout(15)`)
- Di Flutter, pastikan ada loading indicator (skeleton/spinner) yang jelas selama menunggu response AI — jangan biarkan UI terlihat freeze tanpa feedback visual

### 1.5 Test Manual
- Test AI Insight generation dengan minimal 3 skenario data berbeda (siswa kuat, siswa lemah, siswa campuran) — pastikan hasil insight relevan dan tidak generic/berulang sama persis
- Test AI Tutor dengan 5 pertanyaan berbeda seputar materi (Loop, Array, dll) — pastikan jawaban kontekstual sesuai level siswa

---

## STEP 2 — Visual Polishing Flutter

### 2.1 Konsistensi Desain
Cek dan perbaiki semua screen supaya konsisten dengan design system:
- Warna: Deep Navy `#0B132B`, Electric Blue `#2563EB`, Cyan `#06B6D4`, Mint `#10B981`, Amber `#F59E0B`, Red `#EF4444`
- Font: Inter di semua text widget (cek `pubspec.yaml` sudah include font, dan `ThemeData` sudah set default)
- Border radius kartu: konsisten 16-20px di semua Card/Container
- Spacing/padding: konsisten (kelipatan 8px disarankan)

### 2.2 Perbaikan Detail per Screen
- **Login Screen**: pastikan validasi form (email format, password minimal karakter) jalan dan pesan error jelas
- **Dashboard**: pastikan skor intelligence dan insight card tidak overflow di layar kecil
- **Competency Map**: progress bar warna sesuai threshold (merah <50%, kuning 50-75%, hijau >75%)
- **Assessment Screen**: pastikan transisi antar soal smooth, feedback benar/salah jelas terlihat (warna + ikon, bukan cuma teks)
- **AI Tutor**: bubble chat kiri-kanan jelas beda warna (user vs AI), auto-scroll ke bawah saat ada pesan baru
- **Recommendation Center**: card rekomendasi tidak terpotong teksnya, CTA button jelas dan berfungsi

### 2.3 Responsive Check
- Test di minimal 2 ukuran layar berbeda (misal emulator Pixel dan emulator layar kecil) — pastikan tidak ada elemen UI yang terpotong atau tombol tidak terjangkau

### 2.4 Icon & Asset
- Pastikan semua icon konsisten (gunakan satu icon pack, misal Material Icons atau custom set yang sama)
- Ganti placeholder image (kalau ada) dengan asset final atau ilustrasi sederhana yang sesuai tema

---

## STEP 3 — Data Seeding untuk Demo yang Meyakinkan

### 3.1 Perbaiki Variasi Akun Demo
Pastikan 3 akun learner punya progress yang **jelas berbeda dan masuk akal**, bukan random:
- **Akun A "Bagus"**: mastery_level rata-rata 80-90% di semua kompetensi
- **Akun B "Menengah"**: mastery_level bervariasi, ada yang tinggi ada yang rendah (contoh: Variables 85%, Loop 55%, Array 40%)
- **Akun C "Perlu Perhatian"**: mastery_level rata-rata di bawah 50%

### 3.2 Riwayat Assessment yang Realistis
- Pastikan setiap akun demo punya minimal 1-2 riwayat assessment session yang sudah selesai (supaya insight AI punya data untuk dianalisis, bukan kosong)

### 3.3 Insight & Chat History Awal
- Generate minimal 1 insight AI untuk masing-masing akun sebelum demo (supaya Dashboard tidak kosong saat pertama dibuka)
- Opsional: siapkan 1-2 riwayat chat AI Tutor di akun demo supaya terlihat sudah pernah dipakai

### 3.4 Akun Teacher
- Pastikan akun teacher bisa lihat ketiga akun learner di atas dengan status warna yang sesuai (merah/kuning/hijau) berdasarkan mastery_level rata-rata mereka

---

## STEP 4 — Testing End-to-End (WAJIB, Jangan Skip)

Jalankan skenario penuh ini minimal 3x berturut-turut tanpa error:

### Skenario Test 1 — Jawaban Campuran (Paling Realistis untuk Demo)
1. Login sebagai Akun B (Menengah)
2. Buka Competency Map, cek kompetensi terlemah
3. Mulai Assessment di kompetensi tersebut
4. Jawab 2 soal benar (level naik), lalu 1 soal salah (level turun) — pastikan behavior sesuai
5. Selesaikan assessment (10 soal), cek skor tersimpan
6. Kembali ke Dashboard, cek insight baru muncul
7. Buka AI Tutor, tanya terkait kompetensi tadi, cek jawaban kontekstual
8. Buka Recommendation Center, cek rekomendasi sesuai kelemahan terbaru

### Skenario Test 2 — Kondisi Ekstrem
- Jawab semua soal benar (level harus naik sampai maksimal 5, tidak error)
- Jawab semua soal salah (level harus turun sampai minimal 1, tidak error)

### Skenario Test 3 — Teacher Flow
1. Login sebagai Teacher
2. Cek dashboard menampilkan 3 siswa terurut sesuai status
3. Klik salah satu siswa, cek detail rapor/competency map tampil benar

### Skenario Test 4 — Kondisi Gagal (Edge Case)
- Matikan koneksi internet sesaat saat AI Tutor sedang loading — pastikan tidak crash, muncul fallback message
- Test dengan koneksi lambat (throttle network di emulator) — pastikan loading state tetap terlihat wajar

### Checklist Bug yang Harus Dicek
- [ ] Tidak ada crash di semua screen
- [ ] Tidak ada data yang tidak update setelah aksi (misal skor tidak berubah padahal sudah jawab soal)
- [ ] Tidak ada overflow/UI rusak di layar kecil
- [ ] Loading state selalu muncul saat menunggu response API/AI
- [ ] Logout dan login ulang tidak menyebabkan data corrupt/hilang

---

## STEP 5 — Persiapan Skenario Pitching

### 5.1 Rekam Video Cadangan (WAJIB)
- Rekam full screen recording skenario demo lengkap (skenario di bawah) sebagai cadangan kalau ada masalah teknis saat presentasi live
- Simpan di device offline (jangan cuma di cloud, jaga-jaga internet venue bermasalah)

### 5.2 Skenario Demo Final (5 Menit)
```
0:00-0:30  Hook masalah (guru tidak bisa pantau 30+ siswa satu-satu)
0:30-1:00  Buka Web Teacher Dashboard → tunjukkan siswa "Need Attention"
1:00-3:00  Pindah ke Mobile → login sebagai siswa tsb → kerjakan assessment
           → sengaja jawab salah 1-2x → tunjukkan level soal turun LIVE
3:00-3:45  Kembali ke Dashboard → insight AI baru muncul → buka AI Tutor,
           tanya terkait kelemahan yang terdeteksi
3:45-4:15  Buka Recommendation Center → tunjukkan rekomendasi personal
4:15-5:00  Penutup: arsitektur modular, roadmap Smart City, keberlanjutan
```

### 5.3 Latihan Timing
- Latihan run-through minimal 3x dengan stopwatch, pastikan pas 5 menit (tidak lebih)
- Tentukan siapa yang pegang device mana saat demo (hindari kebingungan siapa klik apa)

### 5.4 Siapkan Jawaban Q&A
Siapkan jawaban singkat untuk pertanyaan yang kemungkinan muncul:
- Sumber soal (manual dibuat tim, bukan AI-generate, untuk jaga kualitas)
- Fallback kalau AI down (sudah ada di Step 1.3)
- Kenapa baru 1 mata pelajaran (fokus MVP matang, struktur sudah generic untuk ekspansi)
- Keamanan data (Sanctum auth, password hashed)
- Model keberlanjutan/bisnis (B2G/B2B, partnership dengan platform belajar existing)

---

## STEP 6 — Final Checklist Sebelum Hari-H

- [ ] API key AI sudah aktif dan ditest real (bukan dummy)
- [ ] Semua screen sudah konsisten desainnya (Step 2)
- [ ] Data demo 3 akun learner + 1 teacher sudah realistis dan bervariasi (Step 3)
- [ ] Testing end-to-end 3x tanpa bug (Step 4)
- [ ] Video cadangan demo sudah direkam dan disimpan offline
- [ ] Latihan pitching sudah pas 5 menit
- [ ] Jawaban Q&A sudah disiapkan dan dilatih
- [ ] Semua device (HP demo, laptop) full battery + charger dibawa
- [ ] Cek APK/build Flutter final sudah di-install di device yang akan dipakai demo (jangan andalkan `flutter run` langsung dari laptop saat demo, install APK release supaya lebih stabil)
- [ ] Backup rencana kalau WiFi venue bermasalah (hotspot pribadi sebagai cadangan)

---

## CATATAN UNTUK ANTIGRAVITY

- Fase ini TIDAK menambah fitur/screen baru — murni finishing dan bug fixing dari yang sudah ada
- Prioritaskan Step 1 (API key asli) dan Step 4 (testing) di atas Step 2 (visual polish) kalau waktu terbatas — fungsi yang solid lebih penting daripada tampilan yang sempurna
- Setiap perubahan kecil di Step 2, langsung test ulang skenario di Step 4 supaya tidak ada regresi (fitur yang tadinya jalan jadi rusak karena perubahan UI)
