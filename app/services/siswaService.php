<?php



require_once __DIR__ . '/../models/siswaModel.php';


class siswaService
{
    private $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new siswaModel();
    }
    // GET ALL DATA SISWA
    public function getAllSiswa()
    {
        return $this->siswaModel->getAllSiswa();
    }

    // GET PAGINATED SISWA
    public function getPaginatedSiswa($limit, $offset, $keyword = '', $kelas = '', $status = '')
    {
        return $this->siswaModel->getPaginatedSiswa($limit, $offset, $keyword, $kelas, $status);
    }

    public function getSiswaCount($keyword = '', $kelas = '', $status = '')
    {
        return $this->siswaModel->getSiswaCount($keyword, $kelas, $status);
    }

    // CREATE DATA SISWA
    public function methodCreateDataSiswa($dataSiswa)
    {

        $this->validateDataSiswa($dataSiswa);

        $result = $this->siswaModel->modelCreateDataSiswa(
            $dataSiswa['nis'],
            $dataSiswa['nama'],
            $dataSiswa['kelas_id'],
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


    // GET SISWA BY ID
    public function getSiswaById($id)
    {
        return $this->siswaModel->modelFindSiswa($id);
    }

    // UPDATE DATA SISWA
    public function methodUpdateDataSiswa($dataSiswa)
    {
        $this->validateDataSiswa($dataSiswa);

        $result = $this->siswaModel->modelUpdateDataSiswa(
            $dataSiswa['nis'],
            $dataSiswa['nama'],
            $dataSiswa['jenis_kelamin'],
            $dataSiswa['alamat'],
            $dataSiswa['tanggal_lahir'],
            $dataSiswa['status'],
            $dataSiswa['no_hp'],
            $dataSiswa['foto'],
            $dataSiswa['kelas_id'],
            $dataSiswa['id']
        );

        if ($result) {
            echo "Berhasil Update Data";
            exit();
        } else {
            echo "Gagal Update Data";
        }
    }
    // DELETE DATA SISWA
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
    // VALIDASI DATA SISWA
    private function validateDataSiswa($dataSiswa)
    {
        if (empty($dataSiswa['nama'])) {
            throw new Exception("Nama tidak boleh kosong", 1);
        }

        if (strlen($dataSiswa['nama']) < 3) {
            throw new Exception("Nama minimal 3 karakter", 1);
        }
    }
    // FUNGSI UNTUK MENGHITUNG JUMLAH SISWA PER KELAS
    public function siswaBulanan()
    {
        return $this->siswaModel->siswaBulanan();
    }
    // FUNGSI UNTUK MENDAPATKAN DATA SISWA BERDASARKAN KELAS
    public function getSiswaByKelas($kelas_id)
    {

        return $this->siswaModel->getSiswaByKelas($kelas_id);
    }
    // FUNGSI UNTUK MENAMPILKAN HALAMAN DAFTAR SISWA
    public function getFilteredSiswa($keyword, $kelas, $status)
    {

        return $this->siswaModel->getFilteredSiswa($keyword, $kelas, $status);
    }
    // FUNGSI UNTUK MENGHITUNG JUMLAH SISWA PER KELAS
    public function jumlah_siswa_kelas()
    {
        return $this->siswaModel->jumlah_siswa_kelas();
    }
}
