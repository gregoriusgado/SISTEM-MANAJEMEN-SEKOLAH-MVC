<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Staff</title>
    <link rel="stylesheet" href="css/daftarStaff.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">
            Data Staff
        </a>
        <div class="navbar-actions">
            <a href="#" class="btn btn-outline">
                Import Data
            </a>
            <a href="#" class="btn btn-outline">
    
                Export Data
            </a>
            <a href="/?url=/staff/createDataStaff" class="btn btn-success">
                Tambah Staff
            </a>
        </div>
    </nav>

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- FILTER BAR -->
        <div class="filter-bar">
            <div class="search-box">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 115 11a6 6 0 0112 0z" />
                </svg>
                <input type="text" name="search" placeholder="Cari nama, atau NIP"
                    value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            </div>

            <div class="filter-group">
                <label>Jabatan</label>
                <select name="jabatan">
                    <option value="">Jabatan</option>
                    <option value="Admin">Admin</option>
                    <option value="Operator">Operator</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Tata Usaha">Tata Usaha</option>
                    <option value="Security">Security</option>
                </select>
            </div>

            <div class="filter-group">
                <label>Tahun Ajaran</label>
                <select name="tahun_ajaran">
                    <option value="">Semua</option>
                    <option value="2024/2025">2024/2025</option>
                    <option value="2023/2024">2023/2024</option>
                </select>
            </div>

            <div class="filter-group">
                <label>Status</label>
                <select name="status">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Non-Aktif</option>
                    <option value="">Semua</option>
                </select>
            </div>
        </div>

        <!-- TABLE CARD -->
        <div class="table-card">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (!empty($staff)): ?>
                        <?php foreach ($staff as $s): ?>

                            <?php
                            // Ambil inisial untuk placeholder foto
                            $namaParts = explode(' ', trim($s['nama']));
                            $inisial = strtoupper(substr($namaParts[0], 0, 1));

                            if (isset($namaParts[1])) $inisial .= strtoupper(substr($namaParts[1], 0, 1));
                            $isAktif = strtolower($s['status']) === 'aktif';
                            ?>

                            <tr>
                                <!-- FOTO -->
                                <td class="foto-col">
                                    <?php if (!empty($s['foto'])): ?>
                                        <img src="/uploads/staff/<?= htmlspecialchars($s['foto']) ?>"
                                            alt="Foto <?= htmlspecialchars(strtoupper($s['nama']) )?>"class="foto-staff">
                                    <?php else: ?>
                                        <span class="foto-placeholder"><?= $inisial ?></span>
                                    <?php endif; ?>
                                </td>

                                <!-- NAMA -->
                                <td>
                                    <div class="nama-staff"><?= htmlspecialchars(strtoupper($s['nama'])) ?></div>
                                    <div class="nis-text"><?= htmlspecialchars($s['jenis_kelamin']) ?></div>
                                </td>

                                <!-- NIS -->
                                <td><?= htmlspecialchars($s['nip']) ?></td>

                                <!-- KELAS -->
                                <td><?= htmlspecialchars($s['jabatan']) ?></td>


                                <!-- STATUS -->
                                <td>
                                    <span class="badge <?= $isAktif ? 'badge-aktif' : 'badge-nonaktif' ?>">
                                        <?= $isAktif ? 'Aktif' : 'Non-Aktif' ?>
                                    </span>
                                </td>

                                <!-- AKSI -->
                                <td>
                                    <div class="aksi-col">
                                        <a href="/?url=/staff/editDataStaff&id=<?= $s['id'] ?>"
                                            class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                                        <a href="/?url=/staff/deleteDataStaff&id=<?= $s['id'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus staff ini?')">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>
                        <tr class="empty-row">
                            <td colspan="9">Belum ada data staff.</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>

            <!-- FOOTER / PAGINATION -->
            <div class="table-footer">
                <span class="pagination-info">
                    <?php if (!empty($staff)): ?>
                        Menampilkan <?= count($staff) ?> data
                    <?php endif; ?>
                </span>

                <div class="pagination">
                    <a href="#" class="page-btn">&#8249;</a>
                    <a href="#" class="page-btn active">1</a>
                    <a href="#" class="page-btn">2</a>
                    <a href="#" class="page-btn">3</a>
                    <a href="#" class="page-btn">&#8250;</a>
                </div>
            </div>
        </div>

    </div><!-- end wrapper -->

</body>
</html>