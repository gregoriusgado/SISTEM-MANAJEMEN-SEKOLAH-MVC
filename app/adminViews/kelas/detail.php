<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas <?= $kelas['nama_kelas'] ?></title>
    <link rel="stylesheet" href="css/detail.css">
</head>
<body>
    <div class="container">
        <h1>Detail Kelas <?= $kelas['nama_kelas'] ?></h1>

        <p><strong>Tingkat:</strong> <?= strtoupper($kelas['tingkat']) ?></p>
        <p><strong>Wali Kelas:</strong> <?= strtoupper($kelas['wali_kelas'] )?></p>

        <h2>Daftar Siswa</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($siswa)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($siswa as $s) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars (ucwords(strtolower($s['nama']))) ?></td>
                            <td><?= htmlspecialchars($s['nis']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">Belum ada siswa</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>