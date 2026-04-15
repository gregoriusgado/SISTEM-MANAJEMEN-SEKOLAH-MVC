<?php



require_once __DIR__ . '/../models/kelasModel.php';

class kelasService
{

    private $kelasModel;

    public function __construct()
    {
        $this->kelasModel = new kelasModel();
    }

    public function getAllKelas() {
          return $this->kelasModel->getAllKelas();
    }

    public function kelasBulanan()
    {
        return $this->kelasModel->kelasBulanan();
        return $result['total'];
    }


      public function createDataKelas($dataKelas) {
        // $this->validateDataSiswa($dataKelas);

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

    public function getKelasById($id) {
        return $this->kelasModel->modelFindKelas($id);
    }

    public function updateDataKelas($dataKelas) {
        // $this->validateDataSiswa($dataKelas);

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

    
}
