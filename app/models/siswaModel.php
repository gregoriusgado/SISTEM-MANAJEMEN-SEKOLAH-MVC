<?php

require_once __DIR__ . '/../core/database.php';

class siswaModel
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::getConnection();
  }

  // GET ALL DATA SISWA
  public function getAllSiswa()
  {
    $stmt = $this->conn->query("SELECT * FROM siswa ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // FUNGSI UNTUK MEMBUAT DATA SISWA
  public function modelCreateDataSiswa(
    $nis,
    $nama,
    $kelas_id,
    $jenis_kelamin,
    $alamat,
    $tanggal_lahir,
    $status_siswa,
    $no_hp,
    $foto
  ) {
    $stmt = $this->conn->prepare("
        INSERT INTO siswa 
        (nis, nama, jenis_kelamin, alamat, tanggal_lahir, status_siswa, no_hp, foto, kelas_id) 
        VALUES (?,?,?,?,?,?,?,?,?)
    ");

    return $stmt->execute([
      $nis,
      $nama,
      $jenis_kelamin,
      $alamat,
      $tanggal_lahir,
      $status_siswa,
      $no_hp,
      $foto,
      $kelas_id,
    ]);
  }

  // FIND ID UNTUK MENAMPILKAN DATA SISWA YANG AKAN DI-UPDATE
  public function modelFindSiswa($id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM siswa WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // FUNGSI UNTUK MENGUPDATE DATA SISWA 
  public function modelUpdateDataSiswa(
    $id,
    $nis,
    $nama,
    $jenis_kelamin,
    $alamat,
    $tanggal_lahir,
    $status_siswa,
    $no_hp,
    $foto,
    $kelas_id
  ) {
    $stmt = $this->conn->prepare("
        UPDATE siswa SET nis = ?, nama = ?, jenis_kelamin = ?, alamat = ?,
        tanggal_lahir = ?,status_siswa = ?,no_hp = ?,foto = ?, kelas_id = ?
        WHERE id = ?
    ");
    return $stmt->execute([
      $nis,
      $nama,
      $jenis_kelamin,
      $alamat,
      $tanggal_lahir,
      $status_siswa,
      $no_hp,
      $foto,
      $kelas_id,
      $id
    ]);
  }

  // FUNGSI UNTUK MENGHAPUS DATA SISWA
  public function modelDeleteDataSiswa($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM siswa WHERE id = ?");
    return $stmt->execute([$id]);
  }

  //update jumlah bulanan
  public function siswaBulanan()
  {

    $stmt = $this->conn->query("SELECT COUNT(*) as total
  FROM siswa
  WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01'); ");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }



  public function getSiswaByKelas($kelas_id)
  {
    $stmt = $this->conn->prepare("
        SELECT id, nama, nis
        FROM siswa
        WHERE kelas_id = ?
    ");

    $stmt->execute([$kelas_id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
