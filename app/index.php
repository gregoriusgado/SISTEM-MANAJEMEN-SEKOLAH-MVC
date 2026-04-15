<?php
$current_url = $_GET['url'] ?? '/dashboard';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SMP RIA BAHAGIA 2</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <style>

    </style>
</head>

<body>


    <!-- sidebar -->

    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="nama-sekolah">SMP RIA BAHAGIA 2</div>
            <div class="sub-nama">sistem manajemen sekolah</div>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section">Utama</div>

            <a href="/?url=/pengumuman" class="nav-item <?= $current_url === '/pengumuman' ? 'active' : '' ?>">
                <span class="nav-icon">📢</span> Pengumuman
                <span class="nav-badge">3</span>
            </a>
            <a href="/?url=/jadwal" class="nav-item <?= $current_url === '/jadwal' ? 'active' : '' ?>">
                <span class="nav-icon">🗓</span> Jadwal Pelajaran
            </a>

            <div class="nav-section-label">Data Master</div>

            <a href="/?url=/siswa/daftarSiswa" class="nav-item <?= $current_url === '/siswa/daftarSiswa' ? 'active' : '' ?>">
                <span class="nav-icon">👨‍🎓</span> Daftar Siswa
            </a>
            <a href="/?url=/guru/daftarGuru" class="nav-item <?= $current_url === '/guru/daftarGuru' ? 'active' : '' ?>">
                <span class="nav-icon">👨‍🏫</span> Daftar Guru
            </a>
            <a href="/?url=/staff/daftarStaff" class="nav-item <?= $current_url === '/staff/daftarStaff' ? 'active' : '' ?>">
                <span class="nav-icon">🗂</span> Daftar Staff
            </a>
            <a href="/?url=/kelas/daftarKelas" class="nav-item <?= $current_url === '/dafarKelas' ? 'active' : '' ?>">
                <span class="nav-icon">🏫</span> Kelas
            </a>


            <div class="nav-section-label">Akademik</div>

            <a href="/?url=/absensi" class="nav-item <?= $current_url === '/absensi' ? 'active' : '' ?>">
                <span class="nav-icon">✅</span> Absensi
            </a>
            <a href="/?url=/nilai" class="nav-item <?= $current_url === '/nilai' ? 'active' : '' ?>">
                <span class="nav-icon">📝</span> Penilaian
            </a>
            <a href="/?url=/spp" class="nav-item <?= $current_url === '/spp' ? 'active' : '' ?>">
                <span class="nav-icon">💰</span> Keuangan / SPP
            </a>

            <div class="nav-section-label">Sistem</div>
            <a href="/?url=/pengaturan" class="nav-item <?= $current_url === '/pengaturan' ? 'active' : '' ?>">
                <span class="nav-icon">⚙️</span> Pengaturan
            </a>
            <a href="/?url=/logout" class="nav-item">
                <span class="nav-icon">↩</span> Logout
            </a>


        </nav>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar">A</div>
                <div>
                    <div class="user-name">Admin</div>
                    <div class="user-role">Administrator</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- mainn -->

    <div class="main">
        <header class="topbar">
            <div class="topbar-title">Dashboard</div>
            <div class="topbar-right">
                <div class="topbar-date">
                    <?= date('l, d F Y') ?>
                </div>
                <div class="notif-btn">
                    🔔<div class="notif-dot"></div>
                </div>
            </div>
        </header>

        <div class="content">
            <div class="page-header">
                <h1>Selamat Datang 👋</h1>
                <p>Berikut ringkasan data sekolah hari ini, <?= date('d F Y') ?></p>
            </div>

            <div class="stats-grid">
                <div class="stat-card c1">
                    <div class="stat-icon">👨‍🎓</div>
                    <div class="stat-value"><?= count($siswa) ?></div>
                    <div class="stat-label">Total Siswa</div>
                    <div class="stat-change">tambahan <?= $siswaBulanan['total'] ?> siswa bulan ini</div>
                </div>
                <div class="stat-card c2">
                    <div class="stat-icon">👨‍🏫</div>
                    <div class="stat-value"><?= count($guru) ?></div>
                    <div class="stat-label">Total Guru</div>
                    <div class="stat-change">tambahan <?= $guruBulanan['total'] ?> guru bulan ini</div>
                </div>
                <div class="stat-card c3">
                    <div class="stat-icon">🗂</div>
                    <div class="stat-value"><?= count($staff) ?></div>
                    <div class="stat-label">Total Staff</div>
                    <div class="stat-change">tambahan <?= $staffBulanan['total'] ?> staff bulan ini</div>
                </div>
                <div class="stat-card c4">
                    <div class="stat-icon">🏫</div>
                    <div class="stat-value"><?=  count($kelas) ?></div>
                    <div class="stat-label">Total Kelas</div>
                   <div class="stat-change"><?= $kelasBulanan['total'] ?> total kelas bulan ini</div>
                    <div class="stat-change">Tahun ajaran 2024/2025</div>
                </div>
            </div> <!-- BOTTOM GRID -->
            <div class="bottom-grid">
                <!-- Tabel Absensi Hari Ini -->
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">Absensi Hari Ini</div>
                        <a href="/?url=/absensi" class="panel-link">Lihat semua →</a>
                    </div>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Siswa</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $absensi = [
                                ['Andi Saputra',    'XII RPL 1', 'Hadir',  '07:15', 'green'],
                                ['Bella Kurniawan', 'XI TKJ 2',  'Sakit',  '—',     'yellow'],
                                ['Cahyo Wibowo',    'X AKL 1',   'Hadir',  '07:08', 'green'],
                                ['Diana Putri',     'XII MM 2',  'Alfa',   '—',     'red'],
                                ['Eko Santoso',     'XI RPL 1',  'Izin',   '—',     'yellow'],
                                ['Fira Ramadani',   'X TKJ 1',   'Hadir',  '07:22', 'green'],
                            ];
                            foreach ($absensi as $row):
                                $init = strtoupper(substr($row[0], 0, 1));
                            ?>
                                <tr>
                                    <td>
                                        <div class="td-name">
                                            <div class="avatar-sm"><?= $init ?></div>
                                            <?= htmlspecialchars($row[0]) ?>
                                        </div>
                                    </td>
                                    <td style="color:var(--muted);font-size:13px"><?= $row[1] ?></td>
                                    <td><span class="badge badge-<?= $row[4] ?>"><?= $row[2] ?></span></td>
                                    <td style="color:var(--muted);font-size:13px"><?= $row[3] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pengumuman -->
                <div class="panel">
                    <div class="panel-header">
                        <div class="panel-title">Pengumuman Terbaru</div>
                        <a href="/?url=/pengumuman" class="panel-link">Semua →</a>
                    </div>
                    <div class="ann-list">
                        <?php
                        $ann = [
                            ['Ujian Tengah Semester dimulai 14 April 2026', '2 jam lalu', '#4f7cff'],
                            ['Libur Nasional Hari Jumat tanggal 11 April', '5 jam lalu', '#f5a623'],
                            ['Pengumpulan tugas Praktik XII RPL diperpanjang', 'Kemarin', '#3ecf8e'],
                            ['Rapat Komite Sekolah — Sabtu 12 April 08.00', 'Kemarin', '#e05252'],
                        ];
                        foreach ($ann as $a):
                        ?>
                            <div class="ann-item">
                                <div class="ann-dot" style="background:<?= $a[2] ?>"></div>
                                <div class="ann-body">
                                    <div class="ann-title"><?= $a[0] ?></div>
                                    <div class="ann-meta"><?= $a[1] ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

</div>
</div>







</body>