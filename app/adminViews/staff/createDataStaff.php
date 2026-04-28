<?php

$isEdit = !empty($staff);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? "Edit" : "Tambah" ?>Staff</title>
    <link rel="stylesheet" href="css/createData.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="/?url=/staff/daftarStaff" class="navbar-brand">
            &#8592; Kembali ke Daftar Staff
        </a>
    </nav>

    <div class="wrapper">

        <h1><?= $isEdit ? "Edit" : "Tambah" ?> <span>Staff</span></h1>

        <form method="POST" action="/?url=<?= $isEdit ? '/staff/updateDataStaff' : '/staff/storeDataStaff' ?>">

            <?php if ($isEdit): ?>
                <input type="hidden" name="id" value="<?= $staff['id'] ?>">
            <?php endif; ?>

            <!-- Baris 1: NIS & Kelas -->
            <div class="form-row">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" placeholder="Contoh: 123456"
                        value="<?= $isEdit ? htmlspecialchars($staff['nip']) : '' ?>">
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select id="jabatan" name="jabatan">
                        <option value="">-- Pilih Jabatan --</option>
                        <?php
                        $jabatanList = ['Admin', 'Operator', 'Keuangan', 'TU', 'Security'];
                        foreach ($jabatanList as $j):
                            $selected = ($isEdit && $staff['jabatan'] === $j) ? 'selected' : '';
                        ?>
                            <option value="<?= $j ?>" <?= $selected ?>><?= $j ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Nama lengkap staff"
                    value="<?= $isEdit ? htmlspecialchars($staff['nama']) : '' ?>">
            </div>

            <!-- Baris 2: Jenis Kelamin & Tanggal Lahir -->
            <div class="form-row">
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki" <?= ($isEdit && $staff['jenis_kelamin'] === 'Laki-Laki') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Perempuan" <?= ($isEdit && $staff['jenis_kelamin'] === 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status">
                        <option value="aktif"    <?= ($isEdit && $staff['status'] === 'aktif')    ? 'selected' : '' ?>>Aktif</option>
                        <option value="tidak aktif" <?= ($isEdit && $staff['status'] === 'tidak aktif') ? 'selected' : '' ?>>Non-Aktif</option>
                    </select>
                </div>
            </div>

            <!-- Foto -->
            <div class="form-group">
                <label for="foto">Nama File Foto</label>
                <input type="text" id="foto" name="foto" placeholder="contoh: foto_staff.jpg"
                    value="<?= $isEdit ? htmlspecialchars($staff['foto']) : '' ?>">
            </div>

            <hr class="form-divider">

            <!-- Tombol -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    &#10003; <?= $isEdit ? 'Update' : 'Simpan' ?>
                </button>
                <a href="/?url=/staff/daftarStaff" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</body>

</html>