<?php



require_once __DIR__ . '/../models/staffModel.php';


class staffService
{
    private $staffModel;

    public function __construct()
    {
        $this->staffModel = new staffModel();
    }

    public function getAllStaff()
    {
        return $this->staffModel->getAllStaff();
    }


    public function createDataStaff($dataStaff)
    {

        $this->validateDataStaff($dataStaff);

        $result = $this->staffModel->modelCreateDataStaff(
            $dataStaff['nip'],
            $dataStaff['nama'],
            $dataStaff['status'],
            $dataStaff['jenis_kelamin'],
            $dataStaff['jabatan'],
            $dataStaff['foto']


        );

        if ($result) {
            echo "Berhasil Menambah Data";
            exit();
        } else {
            echo "Gagal Menambah data";
        }
    }



    public function getStaffById($id)
    {
        return $this->staffModel->modelFindStaff($id);
    }


    public function updateDataStaff($dataStaff)
    {
        $this->validateDataStaff($dataStaff);

        $result = $this->staffModel->modelUpdateDataStaff(
            $dataStaff['nip'],
            $dataStaff['nama'],
            $dataStaff['status'],
            $dataStaff['jenis_kelamin'],
            $dataStaff['jabatan'],
            $dataStaff['foto'],
            $dataStaff['id']
        );

        if ($result) {
            echo "Berhasil Update Data";
            exit();
        } else {
            echo "Gagal Update Data";
        }
    }
    // public function delete
    public function deleteDataStaff($id)
    {
        $id = intval($id);

        if ($id <= 0) {
            return false;
        }

        $result = $this->staffModel->modelDeleteDataStaff($id);
        if ($result) {
            echo "Berhasil Menghapus";
            exit();
        } else {
            echo "Gagal menghapus data";
        }
    }

    private function validateDataStaff($dataStaff)
    {
        if (empty($dataStaff['nama'])) {
            throw new Exception("Nama tidak boleh kosong", 1);
        }

        if (strlen($dataStaff['nama']) < 3) {
            throw new Exception("Nama minimal 3 karakter", 1);
        }
    }

     public function staffBulanan() {
          return $this->staffModel->staffBulanan();
            return $result['total'];
    }
}
