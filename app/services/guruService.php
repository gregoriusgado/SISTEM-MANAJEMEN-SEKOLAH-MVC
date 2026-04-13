<?php



require_once __DIR__ . '/../models/guruModel.php';


class guruService
{
    private $guruModel;

    public function __construct()
    {
        $this->guruModel = new guruModel();
    }

    public function getAllGuru()
    {
        return $this->guruModel->getAllGuru();
    }


    public function createDataGuru($dataGuru)
    {

        $this->validateDataGuru($dataGuru);

        $result = $this->guruModel->modelCreateDataGuru(
            $dataGuru['nip'],
            $dataGuru['nama'],
            $dataGuru['status'],
            $dataGuru['jenis_kelamin'],
            $dataGuru['jabatan'],
            $dataGuru['foto']


        );

        if ($result) {
            echo "Berhasil Menambah Data";
            exit();
        } else {
            echo "Gagal Menambah data";
        }
    }



    public function getGuruById($id)
    {
        return $this->guruModel->modelFindGuru($id);
    }


    public function updateDataGuru($dataGuru)
    {
        $this->validateDataGuru($dataGuru);

        $result = $this->guruModel->modelUpdateDataGuru(
            $dataGuru['nip'],
            $dataGuru['nama'],
            $dataGuru['status'],
            $dataGuru['jenis_kelamin'],
            $dataGuru['jabatan'],
            $dataGuru['foto'],
            $dataGuru['id']
        );

        if ($result) {
            echo "Berhasil Update Data";
            exit();
        } else {
            echo "Gagal Update Data";
        }
    }
    // public function delete
    public function deleteDataGuru($id)
    {
        $id = intval($id);

        if ($id <= 0) {
            return false;
        }

        $result = $this->guruModel->modelDeleteDataGuru($id);
        if ($result) {
            echo "Berhasil Menghapus";
            exit();
        } else {
            echo "Gagal menghapus data";
        }
    }

    private function validateDataGuru($dataGuru)
    {
        if (empty($dataGuru['nama'])) {
            throw new Exception("Nama tidak boleh kosong", 1);
        }

        if (strlen($dataGuru['nama']) < 3) {
            throw new Exception("Nama minimal 3 karakter", 1);
        }
    }

     public function guruBulanan() {
          return $this->guruModel->guruBulanan();
            return $result['total'];
    }
}
