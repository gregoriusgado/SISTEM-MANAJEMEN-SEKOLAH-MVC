<?php



require_once __DIR__ . '/../models/siswaModel.php';


class siswaService
{
    private $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new siswaModel();
    }

    public function getAllSiswa()
    {
        return $this->siswaModel->getAllSiswa();
    }


    public function methodCreateDataSiswa($dataSiswa)
    {

        $this->validateDataSiswa($dataSiswa);

        $result = $this->siswaModel->modelCreateDataSiswa(
            $dataSiswa['nis'],
            $dataSiswa['nama'],
            $dataSiswa['kelas'],
            $dataSiswa['jenis_kelamin'],
            $dataSiswa['alamat'],
            $dataSiswa['tanggal_lahir'],
            $dataSiswa['status'],
            $dataSiswa['no_hp'],
            $dataSiswa['foto']


        );

        if ($result) {
            echo "Berhasil Menambah Data";
            exit();
        } else {
            echo "Gagal Menambah data";
        }
    }



    public function getSiswaById($id)
    {
        return $this->siswaModel->modelFindSiswa($id);
    }


    public function methodUpdateDataSiswa($dataSiswa)
    {
        $this->validateDataSiswa($dataSiswa);

        $result = $this->siswaModel->modelUpdateDataSiswa(
            $dataSiswa['id'],
            $dataSiswa['nis'],
            $dataSiswa['nama'],
            $dataSiswa['kelas'],
            $dataSiswa['jenis_kelamin'],
            $dataSiswa['alamat'],
            $dataSiswa['tanggal_lahir'],
            $dataSiswa['status'],
            $dataSiswa['no_hp'],
            $dataSiswa['foto']
        );

        if ($result) {
            echo "Berhasil Update Data";
            exit();
        } else {
            echo "Gagal Update Data";
        }
    }
    // public function delete
    public function methodDeleteDataSiswa($id)
    {
        $id = intval($id);

        if ($id <= 0) {
            return false;
        }

        $result = $this->siswaModel->modelDeleteDataSiswa($id);
        if ($result) {
            echo "Berhasil Menghapus";
            exit();
        } else {
            echo "Gagal menghapus data";
        }
    }

    private function validateDataSiswa($dataSiswa)
    {
        if (empty($dataSiswa['nama'])) {
            throw new Exception("Nama tidak boleh kosong", 1);
        }

        if (strlen($dataSiswa['nama']) < 3) {
            throw new Exception("Nama minimal 3 karakter", 1);
        }
    }
    
    public function siswaBulanan() {
          return $this->siswaModel->siswaBulanan();
            return $result['total'];
    }
}
