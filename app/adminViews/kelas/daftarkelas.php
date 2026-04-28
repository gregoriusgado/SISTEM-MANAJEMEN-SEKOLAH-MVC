<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SMP RIA BAHAGIA 2</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/daftarKelas.css">
    <style>

    </style>
</head>

<body>



    <!-- Main -->
    <div class="stats-grid">
        <?php if (empty($kelas)): ?>
            <p class="empty-state">Belum ada kelas. Tambahkan kelas baru.</p>
        <?php else: ?>

            <a href="/?url=/kelas/createDataKelas" class="btn btn-success">
                Tambah Kelas
            </a>

            <!-- Render List Kelas -->
            <?php foreach ($kelas as $item): ?>
                <div class="stat-card">
                    <div class="kelas-badge"><?= htmlspecialchars($item['tingkat']) ?></div>
                    <h3 class="kelas-nama"><?= strtoupper(htmlspecialchars($item['nama_kelas'])) ?></h3>
                    <p class="kelas-wali">👨‍🏫 Wali Kelas :
                        <?= $item['wali_kelas'] ? htmlspecialchars(ucwords($item['wali_kelas'])) : '<span class="kosong">Belum ada wali kelas</span>' ?>
                    </p>
                    <div class="kelas-footer">
                        <span>Kapasitas: <?= $item['kapasitas'] ?> siswa</span>
                        <span>Jumlah : <?= $item['jumlah_siswa'] ?> siswa</span>
                        <a href="/?url=/kelas/detailKelas&id=<?= $item['id'] ?>">Detail →</a>
                    </div>
                    <div class="aksi_col">
                        <a href="/?url=/kelas/editDataKelas&id=<?= $item['id'] ?>"
                            class="btn btn-primary btn-sm">
                            Edit
                        </a>
                        <a href="/?url=/kelas/hapusDataKelas&id=<?= $item['id'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus kelas ini?')">
                            Hapus
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>



</body>

</html>

</div>
</div>







</body>