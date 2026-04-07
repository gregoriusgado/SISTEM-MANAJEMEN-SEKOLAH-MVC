<?php

$isEdit = !empty($siswa);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? "Edit" : "Tambah" ?> Siswa </title>
</head>

<body>
    <h1><?= $isEdit ? "Edit" : "Tambah" ?> <span>Siswa</span></h1>

    <form method="POST" action="/?url=<?= $isEdit ? '/siswa/updateDataSiswa': '/siswa/storeDataSiswa' ?>">

        <?php if ($isEdit): ?>
            <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
        <?php endif; ?>

        <label>NIS</label><br>
        <input type="text" name="nis" placeholder="NIS"
            value="<?= $isEdit ? htmlspecialchars($siswa['nis']) : '' ?>">
        <br>
        <label>NAMA</label><br>
        <input type="text" name="nama" placeholder="Nama"
            value="<?= $isEdit ? htmlspecialchars($siswa['nama']) : '' ?>">
        <br>

        <label>KELAS</label><br>
        <input type="text" name="kelas" placeholder="Kelas"
            value="<?= $isEdit ? htmlspecialchars($siswa['kelas']) : '' ?>">
        <br>

        <label>JENIS KELAMIN</label><br>
        <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin"
            value="<?= $isEdit ? htmlspecialchars($siswa['jenis_kelamin']) : '' ?>">
        <br>

        <label>ALAMAT</label><br>
        <input type="text" name="alamat" placeholder="Alamat"
            value="<?= $isEdit ? htmlspecialchars($siswa['alamat']) : '' ?>">
        <br>

        <label>TANGGAL LAHIR</label><br>
        <input type="text" name="tanggal_lahir" placeholder="Tanggal lahir"
            value="<?= $isEdit ? htmlspecialchars($siswa['tanggal_lahir']) : '' ?>">
        <br>

        <label>STATUS</label><br>
        <input type="text" name="status" placeholder="Status"
            value="<?= $isEdit ? htmlspecialchars($siswa['status_siswa']) : '' ?>">
        <br>

        <label>NOMOR HP</label><br>
        <input type="text" name="no_hp" placeholder="Nomor Handphone Aktif"
            value="<?= $isEdit ? htmlspecialchars($siswa['no_hp']) : '' ?>">
        <br>

        <label>FOTO</label><br>
        <input type="text" name="foto" placeholder="Upload Foto"
            value="<?= $isEdit ? htmlspecialchars($siswa['foto']) : '' ?>">
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>