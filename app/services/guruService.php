<?php



require_once __DIR__ . '/../models/guruModel.php';


class guruService
{
    private $guruModel;

    public function __construct()
    {
        $this->guruModel = new guruModel();
    }

    // FUNGSI UNTUK MENAMPILKAN SEMUA DATA GURU
    public function getAllGuru()
    {
        return $this->guruModel->getAllGuru();
    }

    // FUNGSI UNTUK MEMBUAT DATA GURU BARU
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


    // FUNGSI UNTUK MENAMPILKAN DATA GURU BERDASARKAN ID
    public function getGuruById($id)
    {
        return $this->guruModel->modelFindGuru($id);
    }

    // FUNGSI UNTUK MEMPERBARUI DATA GURU BERDASARKAN ID
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
    
    // FUNGSI UNTUK MENGHAPUS DATA GURU BERDASARKAN ID
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

    // FUNGSI UNTUK VALIDASI DATA GURU
    private function validateDataGuru($dataGuru)
    {
        if (empty($dataGuru['nama'])) {
            throw new Exception("Nama tidak boleh kosong", 1);
        }

        if (strlen($dataGuru['nama']) < 3) {
            throw new Exception("Nama minimal 3 karakter", 1);
        }
    }

    // FUNGSI UNTUK MENGHITUNG TOTAL GURU BULANAN
     public function guruBulanan() {
          return $this->guruModel->guruBulanan();
            return $result['total'];
    }
    
    // FUNGSI UNTUK MENGHITUNG TOTAL GURU REGULER
    public function guruReguler() {
         return $this->guruModel->guruReguler();
    }
}
