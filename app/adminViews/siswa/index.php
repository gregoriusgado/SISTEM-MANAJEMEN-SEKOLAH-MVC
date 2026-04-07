<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/createData.css">
    
</head>

<body>
    <h1>Daftar Siswa</h1>

    <a href="/?url=/siswa/createDataSiswa">Tambah</a>
   
    <table border="1" cellpadding="6" cellspacing="1">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Status</th>
                <th>No Hp</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <?php if (!empty($siswa)): ?>
                <?php foreach ($siswa as $s): ?>
                    <tr>

                         <td>
                            <?= htmlspecialchars($s['nis']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($s['nama']) ?>
                        </td>

                         <td>
                            <?= htmlspecialchars($s['kelas']) ?>
                        </td>

                         <td>
                            <?= htmlspecialchars($s['jenis_kelamin']) ?>
                        </td>

                         <td>
                            <?= htmlspecialchars($s['alamat']) ?>
                        </td>

                         <td>
                            <?= htmlspecialchars($s['tanggal_lahir']) ?>
                        </td>

                         <td>
                            <?= htmlspecialchars($s['status_siswa']) ?>
                        </td>

                         <td>
                            <?= htmlspecialchars($s['no_hp']) ?>
                        </td>

                         <td>
                            <?= htmlspecialchars($s['foto']) ?>
                        </td>

                        <td>
                             <a href="/?url=/siswa/editDataSiswa&id=<?= $s['id'] ?>"
                                onclick="return confirm('update siswa ini?')">
                                Edit
                            </a>
                               <a href="/?url=/siswa/deleteDataSiswa&id=<?= $s['id'] ?>"
                                onclick="return confirm('Hapus siswa ini?')">
                                Hapus
                            </a>
                        </td>
                        
                    
                         
                     

                    </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="7">Belum ada siswa</td>
                </tr>

            <?php endif; ?>

        </tbody>
    </table>

</body>

</html>