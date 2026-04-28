<?php



require_once __DIR__ . '/../models/kelasModel.php';

class kelasService
{

    // properti untuk menyimpan instance dari kelasModel
    private $kelasModel;
    
    // konstruktor untuk menginisialisasi kelasModel saat objek kelasService dibuat
    public function __construct()
    {
        $this->kelasModel = new kelasModel();
    }

    // fungsi untuk mendapatkan semua data kelas dari model
    public function getAllKelas() {
          return $this->kelasModel->getAllKelas();
    }

    // fungsi untuk membuat data kelas baru dengan memanggil method createKelas dari model
      public function createDataKelas($dataKelas) {
    

        $result = $this->kelasModel->createKelas(
           $dataKelas['nama_kelas'],
           $dataKelas['tingkat'],
           $dataKelas['wali_kelas_id'],
           $dataKelas['kapasitas'],
           $dataKelas['tahun_ajaran']
        );

        if ($result) {
            echo "Berhasil Tambah Data";
            exit();
        } else {
            echo "Gagal Tambah Data";
        }
    }

    // fungsi untuk mendapatkan data kelas berdasarkan id dengan memanggil method modelFindKelas dari model
    public function getKelasById($id) {
        
        return $this->kelasModel->modelFindKelas($id);
    }

    // fungsi untuk mengupdate data kelas dengan memanggil method updateDataKelas dari model
    public function updateDataKelas($dataKelas) {

        $result = $this->kelasModel->modelUpdateDataKelas(
           $dataKelas['id'],
           $dataKelas['nama_kelas'],
           $dataKelas['tingkat'],
           $dataKelas['wali_kelas_id'],
           $dataKelas['kapasitas'],
           $dataKelas['tahun_ajaran']
        );

        if ($result) {
            echo "Berhasil Update Data";
            exit();
        } else {
            echo "Gagal Update Data";
        }
    }

     // public function delete
    public function deleteDataKelas($id)
    {
        $id = intval($id);

        if ($id <= 0) {
            return false;
        }

        $result = $this->kelasModel->modelDeleteDataKelas($id);
        if ($result) {
            echo "Berhasil Menghapus";
            exit();
        } else {
            echo "Gagal menghapus data";
        }
    }


     // fungsi untuk mendapatkan jumlah kelas bulanan dari model
    public function kelasBulanan()
    {
        return $this->kelasModel->kelasBulanan();
        return $result['total'];
    }
    // fungsi untuk mendapatkan list kelas dari model
    public function listKelas() {

       return $this->kelasModel->listKelas();
    }

    
}
