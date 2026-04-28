<?php


require_once __DIR__ . '/../core/database.php';


class kelasModel
{

    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    
    // FUNGSI UNTUK MENAMPILKAN SEMUA DATA KELAS
    public function getAllKelas()
    {
        $stmt = $this->conn->query("SELECT 
            kelas.id,
            kelas.nama_kelas,
            kelas.tingkat,
            kelas.kapasitas,
            guru.nama AS wali_kelas,
            COUNT(siswa.id) AS jumlah_siswa
        FROM kelas
        LEFT JOIN siswa ON siswa.kelas_id = kelas.id
        LEFT JOIN guru ON guru.id = kelas.wali_kelas_id
        GROUP BY kelas.id ORDER BY kelas.tingkat ASC ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    // FUNGSI UNTUK MEMBUAT DATA KELAS
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
        $stmt = $this->conn->prepare(" SELECT 
            k.id,
            k.nama_kelas,
            k.tingkat,
            k.kapasitas,
            k.tahun_ajaran,
            K.wali_kelas_id,
            g.nama AS wali_kelas FROM kelas k LEFT JOIN guru g ON k.wali_kelas_id = g.id WHERE k.id = ? ");

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

    // FUNGSI UNTUK MENGHAPUS DATA KELAS
    public function modelDeleteDataKelas($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM kelas WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function listKelas()
    {
        $stmt = $this->conn->prepare("SELECT id, nama_kelas FROM kelas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // FUNGSI UNTUK MENGHITUNG JUMLAH KELAS YANG DIBUAT DALAM SEBULAN TERAKHIR
     public function kelasBulanan()
    {

        $stmt = $this->conn->query("SELECT COUNT(*) as total
        FROM kelas
        WHERE created_at >= DATE_FORMAT(CURDATE(), '%Y-%m-01'); ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
