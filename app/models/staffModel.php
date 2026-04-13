<?php

require_once __DIR__ . '/../core/database.php';

class staffModel
{
  private $conn;

  public function __construct()
  {
    $this->conn = Database::getConnection();
  }

  // GET ALL DATA staff
  public function getAllStaff()
  {
    $stmt = $this->conn->query("SELECT * FROM staff ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

// FUNGSI UNTUK MEMBUAT DATA staff
  public function modelCreateDataStaff(
    $nip,$nama,$status,$jenis_kelamin,$jabatan,
    $foto
) 
{
    $stmt = $this->conn->prepare("
        INSERT INTO staff 
        (nip, nama,status,jenis_kelamin,jabatan,foto) 
        VALUES (?,?,?,?,?,?)
    ");

    return $stmt->execute([
       $nip, $nama, $status,$jenis_kelamin,$jabatan,
       $foto
    ]);
}

// FIND ID UNTUK MENAMPILKAN DATA Staff YANG AKAN DI-UPDATE
  public function modelFindStaff($id)
  {
    $stmt = $this->conn->prepare("SELECT * FROM staff WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

// FUNGSI UNTUK MENGUPDATE DATA Staff
  public function modelUpdateDataStaff(
    $id,$nip,$nama,$status,$jenis_kelamin,$jabatan,
    $foto) 
{
    $stmt = $this->conn->prepare("
        UPDATE Staff SET nip = ?, nama = ?,status = ?,jenis_kelamin = ?,
        jabatan = ?,foto = ?
        WHERE id = ?
    ");
    return $stmt->execute([
        $id,$nip,$nama,$status,$jenis_kelamin,$jabatan,
        $foto
    ]);
}

// FUNGSI UNTUK MENGHAPUS DATA Guru
  public function modelDeleteDataStaff($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM staff WHERE id = ?");
    return $stmt->execute([$id]);
  }
  // fungsi untuk update tambahan staff
   public function staffBulanan()
  {

  $stmt = $this->conn->query("SELECT COUNT(*) as total
  FROM staff
  WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01'); ");
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
  }

}