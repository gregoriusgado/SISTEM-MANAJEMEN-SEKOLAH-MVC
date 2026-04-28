<?php



require_once __DIR__ . '/../models/staffModel.php';


class staffService
{
    private $staffModel;

    public function __construct()
    {
        $this->staffModel = new staffModel();
    }

    // FUNGSI UNTUK MENAMPILKAN SEMUA DATA STAFF
    public function getAllStaff()
    {
        return $this->staffModel->getAllStaff();
    }

    // FUNGSI UNTUK MEMBUAT DATA STAFF
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


    // FUNGSI UNTUK MENAMPILKAN DATA STAFF BERDASARKAN ID
    public function getStaffById($id)
    {
        return $this->staffModel->modelFindStaff($id);
    }

    // FUNGSI UNTUK MENGUPDATE DATA STAFF
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

    // FUNGSI UNTUK MENGHAPUS DATA STAFF
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

    // FUNGSI UNTUK VALIDASI DATA STAFF
    private function validateDataStaff($dataStaff)
    {
        if (empty($dataStaff['nama'])) {
            throw new Exception("Nama tidak boleh kosong", 1);
        }

        if (strlen($dataStaff['nama']) < 3) {
            throw new Exception("Nama minimal 3 karakter", 1);
        }
    }

    // FUNGSI UNTUK MENGHITUNG JUMLAH STAFF BULANAN
     public function staffBulanan() {

        return $this->staffModel->staffBulanan();
    
    }
}
