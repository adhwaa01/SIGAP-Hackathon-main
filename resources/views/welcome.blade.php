<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIGAP | Intelligence that Understands</title>
        <style>
            :root {
                --navy: #0B132B;
                --blue: #2563EB;
                --cyan: #06B6D4;
                --mint: #10B981;
                --amber: #F59E0B;
                --red: #EF4444;
                --bg: #F8FAFC;
                --white: #FFFFFF;
                --text: #111827;
                --muted: #475569;
                --border: #E2E8F0;
                --shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
            }

            * { box-sizing: border-box; }
            html { scroll-behavior: smooth; }
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background: linear-gradient(180deg, #f8fbff 0%, #eef7ff 100%);
                color: var(--text);
            }
            a { text-decoration: none; }
            .container {
                width: min(1180px, calc(100% - 32px));
                margin: 0 auto;
            }
            .topbar { padding: 22px 0; }
            .topbar-inner {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 18px;
            }
            .brand {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                font-weight: 800;
                font-size: 1.55rem;
                color: var(--navy);
                letter-spacing: 0.04em;
            }
            .brand-mark {
                width: 36px;
                height: 36px;
                display: grid;
                place-items: center;
                border-radius: 12px;
                background: linear-gradient(135deg, var(--blue), var(--cyan));
                color: var(--white);
                box-shadow: var(--shadow);
            }
            .nav {
                display: flex;
                align-items: center;
                gap: 18px;
                color: var(--muted);
                font-size: 0.95rem;
                flex-wrap: wrap;
            }
            .nav a { color: var(--muted); }
            .nav .primary {
                display: inline-block;
                padding: 12px 20px;
                border-radius: 14px;
                background: var(--blue);
                color: var(--white);
                font-weight: 700;
                box-shadow: 0 12px 24px rgba(37, 99, 235, 0.25);
            }
            .hero { padding: 32px 0 40px; }
            .hero-grid {
                display: grid;
                grid-template-columns: 1.2fr 0.8fr;
                gap: 32px;
                align-items: center;
            }
            .eyebrow {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                padding: 9px 14px;
                border-radius: 999px;
                background: rgba(6, 182, 212, 0.12);
                color: #0f766e;
                font-size: 0.78rem;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }
            h1 {
                margin: 18px 0 16px;
                font-size: clamp(2.8rem, 5vw, 5rem);
                line-height: 0.96;
                letter-spacing: -0.065em;
                color: var(--navy);
            }
            h1 span { color: var(--blue); }
            .subtitle {
                max-width: 620px;
                color: var(--muted);
                font-size: 1.12rem;
                line-height: 1.75;
            }
            .cta-row {
                display: flex;
                align-items: center;
                gap: 16px;
                flex-wrap: wrap;
                margin-top: 28px;
            }
            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                border-radius: 14px;
                padding: 15px 22px;
                font-weight: 700;
                transition: transform 0.2s ease;
            }
            .btn:hover { transform: translateY(-1px); }
            .btn-primary {
                background: linear-gradient(135deg, var(--blue), #1d4ed8);
                color: var(--white);
                box-shadow: 0 15px 30px rgba(37, 99, 235, 0.24);
            }
            .btn-secondary {
                background: var(--white);
                color: var(--navy);
                border: 1px solid var(--border);
            }
            .signal {
                display: flex;
                align-items: center;
                gap: 12px;
                margin-top: 26px;
                color: var(--navy);
                font-weight: 600;
                flex-wrap: wrap;
            }
            .signal-badge {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                border-radius: 999px;
                padding: 8px 12px;
                background: rgba(16, 185, 129, 0.12);
                color: #047857;
            }
            .panel {
                background: linear-gradient(180deg, #ffffff 0%, #f4f8ff 100%);
                border: 1px solid rgba(148, 163, 184, 0.25);
                border-radius: 28px;
                padding: 22px 22px 18px;
                box-shadow: var(--shadow);
            }
            .panel-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                color: var(--navy);
                font-weight: 800;
                letter-spacing: 0.04em;
                text-transform: uppercase;
                margin-bottom: 18px;
            }
            .status-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: var(--mint);
                box-shadow: 0 0 0 7px rgba(16, 185, 129, 0.12);
            }
            .score-box {
                display: grid;
                grid-template-columns: 130px 1fr;
                gap: 20px;
                padding: 18px 0 20px;
                border-bottom: 1px solid var(--border);
            }
            .score {
                font-size: 4rem;
                line-height: 1;
                font-weight: 900;
                color: var(--navy);
            }
            .score-tag {
                margin-top: 8px;
                display: inline-block;
                padding: 8px 12px;
                border-radius: 10px;
                background: rgba(37, 99, 235, 0.08);
                color: var(--blue);
                font-weight: 700;
            }
            .metric-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(120px, 1fr));
                gap: 12px;
                margin-top: 16px;
            }
            .metric {
                padding: 16px 14px;
                background: rgba(148, 163, 184, 0.06);
                border-radius: 16px;
            }
            .metric strong {
                display: block;
                font-size: 1.45rem;
                color: var(--navy);
            }
            .metric span {
                color: var(--muted);
                font-size: 0.77rem;
                text-transform: uppercase;
                letter-spacing: 0.06em;
            }
            .insights { padding-top: 16px; }
            .insight {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                padding: 12px 0;
                border-bottom: 1px dashed rgba(148, 163, 184, 0.8);
            }
            .insight:last-child { border-bottom: none; }
            .icon {
                width: 28px;
                height: 28px;
                border-radius: 10px;
                display: grid;
                place-items: center;
                font-size: 0.9rem;
                font-weight: 700;
            }
            .icon.warn { background: rgba(245, 158, 11, 0.14); color: #b45309; }
            .icon.good { background: rgba(16, 185, 129, 0.14); color: #047857; }
            .icon.info { background: rgba(37, 99, 235, 0.12); color: var(--blue); }
            .insight p {
                margin: 0;
                color: var(--muted);
                line-height: 1.6;
            }
            .insight strong {
                display: block;
                margin-bottom: 4px;
                color: var(--navy);
            }
            .section { padding: 34px 0 18px; }
            .section-header { margin-bottom: 24px; }
            .section-header h2 {
                margin: 0 0 10px;
                font-size: clamp(2rem, 4vw, 3rem);
                color: var(--navy);
                letter-spacing: -0.05em;
            }
            .section-header p {
                margin: 0;
                color: var(--muted);
                font-size: 1.05rem;
                line-height: 1.7;
            }
            .roles-grid {
                display: grid;
                grid-template-columns: repeat(5, minmax(0, 1fr));
                gap: 18px;
                margin-top: 18px;
            }
            .role-card {
                background: rgba(255,255,255,0.75);
                border: 1px solid rgba(148,163,184,0.22);
                border-radius: 20px;
                padding: 18px 16px;
                box-shadow: 0 14px 28px rgba(15, 23, 42, 0.04);
            }
            .role-badge {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 38px;
                height: 38px;
                border-radius: 12px;
                margin-bottom: 14px;
                font-size: 1.2rem;
                background: rgba(37, 99, 235, 0.1);
            }
            .role-card h3 {
                margin: 0 0 10px;
                font-size: 1.02rem;
                color: var(--navy);
            }
            .role-card ul {
                margin: 0;
                padding-left: 18px;
                color: var(--muted);
                line-height: 1.8;
                font-size: 0.9rem;
            }
            .feature-grid {
                display: grid;
                grid-template-columns: repeat(4, minmax(0, 1fr));
                gap: 20px;
            }
            .feature-card {
                background: rgba(255,255,255,0.72);
                border: 1px solid rgba(148,163,184,0.2);
                border-radius: 22px;
                padding: 22px;
                box-shadow: 0 14px 30px rgba(15, 23, 42, 0.04);
            }
            .feature-card .icon {
                width: 48px;
                height: 48px;
                border-radius: 14px;
                margin-bottom: 14px;
            }
            .feature-card h3 {
                margin: 0 0 8px;
                font-size: 1.2rem;
                color: var(--navy);
            }
            .feature-card p {
                margin: 0;
                color: var(--muted);
                line-height: 1.7;
            }
            .stack-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 22px;
                margin-top: 14px;
            }
            .stack-card {
                background: var(--white);
                border: 1px solid rgba(148,163,184,0.2);
                border-radius: 24px;
                padding: 26px 22px;
                box-shadow: 0 16px 40px rgba(15, 23, 42, 0.04);
            }
            .stack-card h3 {
                margin: 0 0 16px;
                font-size: 1.5rem;
                color: var(--navy);
            }
            .stack-card ul {
                margin: 0;
                padding-left: 18px;
                color: var(--muted);
                line-height: 2;
            }
            .cta-box {
                margin: 38px 0 50px;
                background: linear-gradient(135deg, var(--navy), #172554 70%, var(--blue));
                border-radius: 28px;
                padding: 30px 28px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
                color: var(--white);
            }
            .cta-box h3 {
                margin: 0 0 8px;
                font-size: clamp(1.8rem, 3vw, 2.5rem);
                letter-spacing: -0.05em;
            }
            .cta-box p {
                margin: 0;
                color: rgba(255,255,255,0.8);
                line-height: 1.7;
            }
            .cta-box .btn-secondary {
                background: rgba(255,255,255,0.12);
                color: var(--white);
                border-color: rgba(255,255,255,0.25);
            }
            @media (max-width: 900px) {
                .hero-grid, .feature-grid, .stack-grid, .roles-grid { grid-template-columns: 1fr 1fr; }
                .cta-box { display: block; }
            }

            @media (max-width: 620px) {
                .hero-grid, .feature-grid, .stack-grid, .roles-grid { grid-template-columns: 1fr; }
            }
        </style>
    </head>
    <body>
        <header class="topbar">
            <div class="container topbar-inner">
                <div class="brand">
                    <span class="brand-mark">S</span>
                    <span>SIGAP</span>
                </div>

                <nav class="nav" aria-label="Main navigation">
                    <a href="#fitur">Fitur</a>
                    <a href="#smart-education">Smart Education</a>
                    <a href="#smart-city">Smart City</a>
                    <a class="primary" href="/login">Masuk Dashboard</a>
                </nav>
            </div>
        </header>

        <main class="container">
            <section class="hero">
                <div class="hero-grid">
                    <div>
                        <span class="eyebrow">Smart Education • Smart City</span>
                        <h1>Intelligence that <span>Understands</span>.<br>Guidance that <span>Acts</span>.</h1>
                        <p class="subtitle">
                            SIGAP adalah platform universal yang mengubah data menjadi insight, rekomendasi,
                            dan tindakan nyata. Sistem ini membantu siswa berkembang lebih cepat dan membantu
                            masyarakat serta instansi mengambil keputusan yang lebih tepat.
                        </p>

                        <div class="cta-row">
                            <a class="btn btn-primary" href="/login">Mulai dengan SIGAP</a>
                            <a class="btn btn-secondary" href="#fitur">Lihat Fitur</a>
                        </div>

                        <div class="signal">
                            <span class="signal-badge">Data → Intelligence → Recommendation → Action → Impact</span>
                        </div>
                    </div>

                    <div class="panel" aria-label="SIGAP intelligence dashboard preview">
                        <div class="panel-header">
                            <span>SIGAP Intelligence</span>
                            <span class="status-dot" aria-hidden="true"></span>
                        </div>

                        <div class="score-box">
                            <div>
                                <div class="score">82</div>
                                <span class="score-tag">Good</span>
                            </div>
                            <div class="metric-grid">
                                <div class="metric">
                                    <strong>12</strong>
                                    <span>Insights</span>
                                </div>
                                <div class="metric">
                                    <strong>4</strong>
                                    <span>Attention</span>
                                </div>
                            </div>
                        </div>

                        <div class="insights">
                            <div class="insight">
                                <span class="icon warn">!</span>
                                <div>
                                    <strong>Area membutuhkan perhatian</strong>
                                    <p>Kompetensi Algoritma perlu penguatan pada sesi minggu ini.</p>
                                </div>
                            </div>
                            <div class="insight">
                                <span class="icon good">✓</span>
                                <div>
                                    <strong>Performa meningkat</strong>
                                    <p>Progress belajar naik 18% dibandingkan 7 hari terakhir.</p>
                                </div>
                            </div>
                            <div class="insight">
                                <span class="icon info">AI</span>
                                <div>
                                    <strong>Rekomendasi baru</strong>
                                    <p>Latihan Array dan struktur data paling relevan untuk hari ini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section" id="roles">
                <div class="section-header">
                    <h2>Role Pengguna</h2>
                    <p>
                        SIGAP dirancang untuk satu platform besar dengan pengalaman yang relevan
                        untuk setiap pengguna, tanpa membuat terlalu banyak kompleksitas.
                    </p>
                </div>

                <div class="roles-grid">
                    <article class="role-card">
                        <div class="role-badge">👤</div>
                        <h3>User / Citizen / Learner</h3>
                        <ul>
                            <li>Dashboard</li>
                            <li>SIGAP Intelligence</li>
                            <li>Recommendation</li>
                            <li>Activity</li>
                            <li>AI Assistant</li>
                        </ul>
                    </article>

                    <article class="role-card">
                        <div class="role-badge">👨‍🏫</div>
                        <h3>Mentor / Teacher</h3>
                        <ul>
                            <li>Progress peserta</li>
                            <li>Competency map</li>
                            <li>Early warning</li>
                            <li>Assessment</li>
                            <li>Intervensi</li>
                        </ul>
                    </article>

                    <article class="role-card">
                        <div class="role-badge">👷</div>
                        <h3>Service Officer</h3>
                        <ul>
                            <li>Laporan</li>
                            <li>Smart Map</li>
                            <li>Prioritas</li>
                            <li>Status laporan</li>
                            <li>Rute penanganan</li>
                        </ul>
                    </article>

                    <article class="role-card">
                        <div class="role-badge">🏢</div>
                        <h3>Institution Admin</h3>
                        <ul>
                            <li>Monitoring</li>
                            <li>Analytics</li>
                            <li>Data management</li>
                            <li>User management</li>
                            <li>Konfigurasi layanan</li>
                        </ul>
                    </article>

                    <article class="role-card">
                        <div class="role-badge">🧠</div>
                        <h3>SIGAP System Admin</h3>
                        <ul>
                            <li>User &amp; role</li>
                            <li>Institution</li>
                            <li>AI configuration</li>
                            <li>Audit log</li>
                            <li>Security</li>
                        </ul>
                    </article>
                </div>
            </section>

            <section class="section" id="fitur">
                <div class="section-header">
                    <h2>Fitur utama SIGAP</h2>
                    <p>
                        Satu platform yang bisa berjalan di smart education maupun smart city,
                        namun tetap menghadirkan pengalaman yang relevan untuk setiap pengguna.
                    </p>
                </div>

                <div class="feature-grid">
                    <article class="feature-card">
                        <div class="icon info">🧠</div>
                        <h3>Insight Engine</h3>
                        <p>Mengubah data menjadi insight yang mudah dibaca dan dipahami untuk pengambilan keputusan.</p>
                    </article>
                    <article class="feature-card">
                        <div class="icon warn">🔮</div>
                        <h3>Prediction Engine</h3>
                        <p>Memprediksi tren, kebutuhan, atau potensi masalah sebelum masalah tersebut benar-benar terjadi.</p>
                    </article>
                    <article class="feature-card">
                        <div class="icon good">🎯</div>
                        <h3>Recommendation Center</h3>
                        <p>Memberikan rekomendasi personal yang berorientasi pada tindakan paling tepat dan cepat.</p>
                    </article>
                    <article class="feature-card">
                        <div class="icon info">🤖</div>
                        <h3>AI Assistant</h3>
                        <p>Interaksi natural-language untuk menjawab pertanyaan, menjelaskan materi, dan mengarahkan tindakan.</p>
                    </article>
                </div>
            </section>

            <section class="section" id="smart-education">
                <div class="section-header">
                    <h2>Smart Education</h2>
                    <p>Adaptive Learning dengan kompetensi, jalur belajar, dan asesmen yang menyesuaikan kebutuhan siswa.</p>
                </div>

                <div class="stack-grid">
                    <div class="stack-card">
                        <h3>Competency Map</h3>
                        <ul>
                            <li>Pemetaan keterampilan per topik</li>
                            <li>Progress visual tiap kompetensi</li>
                            <li>Area prioritas yang perlu ditingkatkan</li>
                        </ul>
                    </div>
                    <div class="stack-card">
                        <h3>Learning Path</h3>
                        <ul>
                            <li>Jalur belajar yang dinamis</li>
                            <li>Materi dibuka sesuai level pengguna</li>
                            <li>Rekomendasi penugasan yang personal</li>
                        </ul>
                    </div>
                    <div class="stack-card">
                        <h3>Adaptive Assessment</h3>
                        <ul>
                            <li>Soal menyesuaikan performa sebelumnya</li>
                            <li>Penjelasan instan setiap jawaban</li>
                            <li>Level kesulitan naik atau turun otomatis</li>
                        </ul>
                    </div>
                    <div class="stack-card">
                        <h3>AI Tutor</h3>
                        <ul>
                            <li>Chat edukatif dengan konteks kemampuan siswa</li>
                            <li>Penjelasan sesuai tingkat pemahaman</li>
                            <li>Panduan belajar yang actionable</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="section" id="smart-city">
                <div class="section-header">
                    <h2>Smart City</h2>
                    <p>Solusi pengelolaan layanan publik, laporan masyarakat, dan keputusan berbasis data lokasi.</p>
                </div>

                <div class="stack-grid">
                    <div class="stack-card">
                        <h3>Smart Report</h3>
                        <ul>
                            <li>Foto, lokasi, dan kategori laporan otomatis</li>
                            <li>Deteksi prioritas dan urgensi</li>
                            <li>Mitigasi masalah berbasis AI</li>
                        </ul>
                    </div>
                    <div class="stack-card">
                        <h3>Smart Map</h3>
                        <ul>
                            <li>Layer peta untuk infrastruktur dan layanan</li>
                            <li>Visualisasi daerah dengan kebutuhan tinggi</li>
                            <li>Pemetaan keterhubungan antar wilayah</li>
                        </ul>
                    </div>
                    <div class="stack-card">
                        <h3>Public Service</h3>
                        <ul>
                            <li>Pencarian layanan sesuai kebutuhan</li>
                            <li>Informasi dokumen, lokasi, hingga tahapan</li>
                            <li>Memudahkan akses masyarakat ke layanan publik</li>
                        </ul>
                    </div>
                    <div class="stack-card">
                        <h3>Report Tracking</h3>
                        <ul>
                            <li>Status laporan dari diterima hingga selesai</li>
                            <li>Transparansi proses perbaikan</li>
                            <li>Pengelolaan eskalasi yang lebih cepat</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="cta-box">
                <div>
                    <h3>Siap membangun masa depan yang lebih cerdas?</h3>
                    <p>SIGAP menggabungkan edukasi personal dan tata kelola layanan publik dalam satu ekosistem yang terintegrasi.</p>
                </div>
                <a class="btn btn-secondary" href="/login">Akses Panel</a>
            </section>
        </main>
    </body>
</html>
