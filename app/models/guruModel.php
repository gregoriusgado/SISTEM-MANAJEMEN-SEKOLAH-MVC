<?php

require_once __DIR__ . '/../core/database.php';

class GuruModel
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::getConnection();
  }

  // FUNGSI UNTUK MENAMPILKAN SEMUA DATA GURU
  public function getAllGuru()
  {
    $stmt = $this->conn->query("SELECT * FROM guru ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // FUNGSI UNTUK MEMBUAT DATA GURU BARU
  public function modelCreateDataGuru($nip, $nama, $status, $jenis_kelamin, $jabatan, $foto)
  {
    $stmt = $this->conn->prepare("
        INSERT INTO Guru 
        (nip, nama,status,jenis_kelamin,jabatan,foto) 
        VALUES (?,?,?,?,?,?)");

    return $stmt->execute([
      $nip,
      $nama,
      $status,
      $jenis_kelamin,
      $jabatan,
      $foto
    ]);
  }

  // FIND ID UNTUK MENAMPILKAN DATA GURU BERDASARKAN ID
  public function modelFindGuru($id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM guru WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // FUNGSI UNTUK MEMPERBARUI DATA GURU BERDASARKAN ID
  public function modelUpdateDataGuru(
    $id,
    $nip,
    $nama,
    $status,
    $jenis_kelamin,
    $jabatan,
    $foto
  ) {
    $stmt = $this->conn->prepare("
        UPDATE Guru SET nip = ?, nama = ?,status = ?,jenis_kelamin = ?,
        jabatan = ?,foto = ?
        WHERE id = ?
    ");
    return $stmt->execute([
      $id,
      $nip,
      $nama,
      $status,
      $jenis_kelamin,
      $jabatan,
      $foto
    ]);
  }

  // FUNGSI UNTUK MENGHAPUS DATA GURU BERDASARKAN ID
  public function modelDeleteDataGuru($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM guru WHERE id = ?");
    return $stmt->execute([$id]);
  }

  // FUNGSI UNTUK MENGHITUNG JUMLAH GURU PER BULAN
  public function guruBulanan()
  {

    $stmt = $this->conn->query("SELECT COUNT(*) as total
  FROM guru
  WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01'); ");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // FUNGSI MENGAMBIL JABATAN GURU REGULER
  public function guruReguler()
  {
    $stmt = $this->conn->query("
        SELECT id, nama FROM guru
        WHERE jabatan = 'guru reguler'
        ORDER BY nama ASC
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
