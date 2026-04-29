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

    // GET PAGINATED SISWA
    public function getPaginatedSiswa($limit, $offset, $keyword = '', $kelas = '', $status = '')
    {
      $sql = "SELECT siswa.*, kelas.nama_kelas FROM siswa LEFT JOIN kelas ON siswa.kelas_id = kelas.id WHERE 1=1 ";
      $params = [];

      if (!empty($keyword)) {
        $sql .= " AND (siswa.nama LIKE :keyword OR siswa.nis LIKE :keyword OR kelas.nama_kelas LIKE :keyword)";
        $params[':keyword'] = "%$keyword%";
      }
      if (!empty($kelas)) {
        $sql .= " AND siswa.kelas_id = :kelas";
        $params[':kelas'] = $kelas;
      }
      if (!empty($status)) {
        $sql .= " AND siswa.status_siswa = :status";
        $params[':status'] = $status;
      }

      $sql .= " ORDER BY siswa.nama ASC LIMIT :limit OFFSET :offset";
      $stmt = $this->conn->prepare($sql);
      foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
      }
      $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
      $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // GET SISWA COUNT FOR PAGINATION
    public function getSiswaCount($keyword = '', $kelas = '', $status = '')
    {
      $sql = "SELECT COUNT(*) as total FROM siswa LEFT JOIN kelas ON siswa.kelas_id = kelas.id WHERE 1=1 ";
      $params = [];
      if (!empty($keyword)) {
        $sql .= " AND (siswa.nama LIKE :keyword OR siswa.nis LIKE :keyword OR kelas.nama_kelas LIKE :keyword)";
        $params[':keyword'] = "%$keyword%";
      }
      if (!empty($kelas)) {
        $sql .= " AND siswa.kelas_id = :kelas";
        $params[':kelas'] = $kelas;
      }
      if (!empty($status)) {
        $sql .= " AND siswa.status_siswa = :status";
        $params[':status'] = $status;
      }
      $stmt = $this->conn->prepare($sql);
      foreach ($params as $key => $val) {
        $stmt->bindValue($key, $val);
      }
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      return $row ? (int)$row['total'] : 0;
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
        tanggal_lahir = ?, status_siswa = ?, no_hp = ?, foto = ?, kelas_id = ? WHERE id = ? ");
    return $stmt->execute([
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

  public function jumlah_siswa_kelas()
  {
    $stmt = $this->conn->query(" SELECT kelas.nama_kelas, count(siswa.id) as jumlah_siswa
    FROM kelas
    LEFT JOIN siswa ON kelas.id = siswa.kelas_id
    GROUP BY kelas.id, kelas.nama_kelas ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // fungsi filter 

  public function getFilteredSiswa($keyword, $kelas, $status)
  {
    $sql = " SELECT siswa.*, kelas.nama_kelas FROM  siswa LEFT JOIN kelas ON siswa.kelas_id = kelas.id
  WHERE 1=1 ";

    $params = [];

    if (!empty($keyword)) {
      $sql .= " AND ( siswa.nama LIKE :keyword OR siswa.nis LIKE :keyword OR kelas.nama_kelas LIKE :keyword )";

      $params[':keyword'] = "%$keyword%";
    }

    if (!empty($kelas)) {
      $sql .=  " AND siswa.kelas_id = :kelas";
      $params[':kelas'] = $kelas;
    }

    if (!empty($status)) {
      $sql .= " AND siswa.status_siswa = :status";
      $params[':status'] = $status;
    }


    $sql .= " ORDER BY siswa.nama ASC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
