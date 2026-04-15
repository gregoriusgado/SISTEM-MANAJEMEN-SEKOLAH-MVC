<?php


require_once __DIR__ . '/../core/database.php';


class kelasModel
{

    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    // GET ALL DATA kelas
    public function getAllKelas()
    {
        $stmt = $this->conn->query("SELECT k.id, k.nama_kelas, k.tingkat, k.kapasitas, k.tahun_ajaran,
                   g.nama AS wali_kelas
            FROM kelas k
            LEFT JOIN guru g ON k.wali_kelas_id = g.id and  g.jabatan = 'guru reguler'
            ORDER BY k.tingkat, k.nama_kelas");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
          return [
        'tingkat' => $tingkat,
        'kelas' => $kelas
    ];
    }

    public function kelasBulanan()
    {

        $stmt = $this->conn->query("SELECT COUNT(*) as total
        FROM kelas
        WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01'); ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


      // FUNGSI UNTUK MEMBUAT DATA kelas
    public function createKelas(
        $nama_kelas,
        $tingkat,
        $wali_kelas_id,
        $kapasitas,
        $tahun_ajaran
    ) {
        $stmt = $this->conn->prepare("
        INSERT INTO kelas (nama_kelas,tingkat,wali_kelas_id,kapasitas,tahun_ajaran)
        VALUES (?,?,?,?,?)
    ");
        return $stmt->execute([
            $nama_kelas,
            $tingkat,
            $wali_kelas_id,
            $kapasitas,
            $tahun_ajaran
            

        ]);
    } 
        
    // FIND ID UNTUK MENAMPILKAN DATA KELAS YANG AKAN DI-UPDATE
    public function modelFindKelas($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM kelas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // FUNGSI UNTUK MENGUPDATE DATA KELAS
    public function modelUpdateDataKelas(
        $id,
        $nama_kelas,
        $tingkat,
        $wali_kelas_id,
        $kapasitas,
        $tahun_ajaran
    ) {
        $stmt = $this->conn->prepare("
        UPDATE kelas SET nama_kelas = ?, tingkat = ?, wali_kelas_id = ?, kapasitas = ?,
        tahun_ajaran = ? WHERE id = ?
    ");
        return $stmt->execute([
            $nama_kelas,
            $tingkat,
            $wali_kelas_id,
            $kapasitas,
            $tahun_ajaran,
            $id

        ]);
    }

    // FUNGSI UNTUK MENGHAPUS DATA Guru
  public function modelDeleteDataKelas($id)
  {
    $stmt = $this->conn->prepare("DELETE FROM kelas WHERE id = ?");
    return $stmt->execute([$id]);
  }
}
