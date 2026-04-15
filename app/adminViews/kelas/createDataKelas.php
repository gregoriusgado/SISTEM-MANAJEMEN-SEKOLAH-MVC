<?php

$isEdit = !empty($kelas);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? "Edit" : "Tambah" ?>Kelas</title>
    <link rel="stylesheet" href="css/createData.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/?url=/kelas/daftarKelas" class="navbar-brand">
            &#8592; Kembali ke Daftar Kelas
        </a>
    </nav>

    <div class="wrapper">

        <h1><?= $isEdit ? "Edit" : "Tambah" ?> <span>Kelas</span></h1>

        <form method="POST" action="/?url=<?= $isEdit ? '/kelas/updateDataKelas' : '/kelas/storeDataKelas' ?>">

            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?= $kelas['id'] ?>">
            <?php endif; ?>

            <!-- Baris 1: NIS & Kelas -->
            <div class="form-row">
                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input type="text" id="nama_kelas"  placeholder="masukan nama kelas" name="nama_kelas"
                        value="<?= $isEdit ? htmlspecialchars($kelas['nama_kelas']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="wali_kelas_id">Wali Kelas</label>
                    <select id="wali_kelas_id" name="wali_kelas_id">
                        <option value="">-- Wali Kelas --</option>
                        <?php foreach ($guru_reguler as $w): ?>
                            <?php $selected = ($isEdit && $waliKelasSekarang  === $w['id']) ? 'selected' : ''; ?>

                            <option value="<?= $w['id'] ?>" <?= $selected ?>>
                                <?= htmlspecialchars($w['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>


                </div>
            </div>


            <div class="form-group">

                <label for="tingkat">Tingkat</label>

                <select name="tingkat"> 
                    <option value="VII" <?= ($isEdit && $kelas['tingkat'] === 'VII')    ? 'selected' : '' ?>>VII</option>
                    <option value="VII"  <?= ($isEdit && $kelas['tingkat'] === 'VIII')    ? 'selected' : '' ?>>VIII</option>
                    <option value="IX"  <?= ($isEdit && $kelas['tingkat'] === 'IX')    ? 'selected' : '' ?>>IX</option>
                </select>

                <div class="form-group">
                    <label for="kapasitas">Kapasitas</label>
                    <input type="number" name="kapasitas" min="1" placeholder="Masukkan kapasitas" max="35"
                        value="<?= $isEdit ? htmlspecialchars($kelas['kapasitas']) : '' ?>">
                </div>
            </div>

            <!-- Foto -->
             <div class="form-group">

                <label for="tahun_ajaran">Tingkat</label>

                <select name="tahun_ajaran"> 
                    <option value="2024/2025" <?= ($isEdit && $kelas['tahun_ajaran'] === '2024/2025')    ? 'selected' : '' ?>>2024/2025</option>
                    <option value="2025/2026"  <?= ($isEdit && $kelas['tingkat'] === 'VIII')    ? 'selected' : '' ?>>2025/2026</option>
                </select>

            <hr class="form-divider">

            <!-- Tombol -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    &#10003; <?= $isEdit ? 'Update' : 'Simpan' ?>
                </button>
                <a href="/?url=/kelas/daftarKelas" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</body>

</html>