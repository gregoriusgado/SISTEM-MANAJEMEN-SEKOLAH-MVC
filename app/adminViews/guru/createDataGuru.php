<?php

$isEdit = !empty($guru);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? "Edit" : "Tambah" ?>Guru</title>
    <link rel="stylesheet" href="css/createData.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/?url=/guru/daftarGuru" class="navbar-brand">
            &#8592; Kembali ke Daftar Guru
        </a>
    </nav>

    <div class="wrapper">

        <h1><?= $isEdit ? "Edit" : "Tambah" ?> <span>Guru</span></h1>

        <form method="POST" action="/?url=<?= $isEdit ? '/guru/updateDataGuru' : '/guru/storeDataGuru' ?>">

            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?= $guru['id'] ?>">
            <?php endif; ?>

            <!-- Baris 1: NIS & Kelas -->
            <div class="form-row">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" placeholder="Contoh: 123456"
                        value="<?= $isEdit ? htmlspecialchars($guru['nip']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select id="jabatan" name="jabatan">
                        <option value="">-- Pilih Jabatan --</option>
                        <?php
                        $jabatanList = ['Kepala Sekolah', 'Wakil Kepala Sekolah', 'BK', 'Guru Reguler'];
                        foreach ($jabatanList as $j):
                            $selected = ($isEdit && $guru['jabatan'] === $j) ? 'selected' : '';
                        ?>
                            <option value="<?= $j ?>" <?= $selected ?>><?= $j ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Nama lengkap siswa"
                    value="<?= $isEdit ? htmlspecialchars($guru['nama']) : '' ?>">
            </div>

            <!-- Baris 2: Jenis Kelamin & Tanggal Lahir -->
            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" <?= ($isEdit && $guru['jenis_kelamin'] === 'Laki-Laki') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($isEdit && $guru['jenis_kelamin'] === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="aktif"    <?= ($isEdit && $guru['status'] === 'aktif')    ? 'selected' : '' ?>>Aktif</option>
                        <option value="nonaktif" <?= ($isEdit && $guru['status'] === 'nonaktif') ? 'selected' : '' ?>>Non-Aktif</option>
                    </select>
                </div>
            </div>

            <!-- Foto -->
            <div class="form-group">
                <label for="foto">Nama File Foto</label>
                <input type="text" id="foto" name="foto" placeholder="contoh: foto_guru.jpg"
                    value="<?= $isEdit ? htmlspecialchars($guru['foto']) : '' ?>">
            </div>

            <hr class="form-divider">

            <!-- Tombol -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    &#10003; <?= $isEdit ? 'Update' : 'Simpan' ?>
                </button>
                <a href="/?url=/guru/daftarGuru" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</body>

</html>