<?php

$isEdit = !empty($siswa);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? "Edit" : "Tambah" ?> Siswa</title>
    <link rel="stylesheet" href="css/createData.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/?url=/siswa/daftarSiswa" class="navbar-brand">
            &#8592; Kembali ke Daftar Siswa
        </a>
    </nav>

    <div class="wrapper">

        <h1><?= $isEdit ? "Edit" : "Tambah" ?> <span>Siswa</span></h1>

        <form method="POST" action="/?url=<?= $isEdit ? '/siswa/updateDataSiswa' : '/siswa/storeDataSiswa' ?>">

            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
            <?php endif; ?>

            <!-- Baris 1: NIS & Kelas -->
            <div class="form-row">
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" id="nis" name="nis" placeholder="Contoh: 123456"
                        value="<?= $isEdit ? htmlspecialchars($siswa['nis']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select id="kelas" name="kelas">
                        <option value="">-- Pilih Kelas --</option>
                        <?php
                        $kelasList = ['VII A', 'VII B', 'VIII A', 'VIII B', 'IX A', 'IX B', 'IX C'];
                        foreach ($kelasList as $k):
                            $selected = ($isEdit && $siswa['kelas'] === $k) ? 'selected' : '';
                        ?>
                            <option value="<?= $k ?>" <?= $selected ?>><?= $k ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Nama lengkap siswa"
                    value="<?= $isEdit ? htmlspecialchars($siswa['nama']) : '' ?>">
            </div>

            <!-- Baris 2: Jenis Kelamin & Tanggal Lahir -->
            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" <?= ($isEdit && $siswa['jenis_kelamin'] === 'Laki-Laki') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($isEdit && $siswa['jenis_kelamin'] === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                        value="<?= $isEdit ? htmlspecialchars($siswa['tanggal_lahir']) : '' ?>">
                </div>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Jl. Contoh No. 1, Kota"
                    value="<?= $isEdit ? htmlspecialchars($siswa['alamat']) : '' ?>">
            </div>

            <!-- Baris 3: No HP & Status -->
            <div class="form-row">
                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="tel" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx"
                        value="<?= $isEdit ? htmlspecialchars($siswa['no_hp']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="aktif"    <?= ($isEdit && $siswa['status_siswa'] === 'aktif')    ? 'selected' : '' ?>>Aktif</option>
                        <option value="nonaktif" <?= ($isEdit && $siswa['status_siswa'] === 'nonaktif') ? 'selected' : '' ?>>Non-Aktif</option>
                    </select>
                </div>
            </div>

            <!-- Foto -->
            <div class="form-group">
                <label for="foto">Nama File Foto</label>
                <input type="text" id="foto" name="foto" placeholder="contoh: foto_siswa.jpg"
                    value="<?= $isEdit ? htmlspecialchars($siswa['foto']) : '' ?>">
            </div>

            <hr class="form-divider">

            <!-- Tombol -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    &#10003; <?= $isEdit ? 'Update' : 'Simpan' ?>
                </button>
                <a href="/?url=/siswa/daftarSiswa" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</body>

</html>