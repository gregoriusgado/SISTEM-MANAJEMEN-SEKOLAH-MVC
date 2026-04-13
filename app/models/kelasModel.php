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
    }

    public function kelasBulanan()
    {

        $stmt = $this->conn->query("SELECT COUNT(*) as total
        FROM kelas
        WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01'); ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
