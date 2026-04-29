<?php

require_once __DIR__ . '/../services/siswaService.php';
require_once __DIR__ . '/../services/kelasService.php';


class siswaController
{
    private $siswaService;
    private $kelasService;


    public function __construct()
    {
        $this->siswaService = new siswaService();
        $this->kelasService = new kelasService();
    }

    public function daftarSiswa()
    {
           // Pagination
           $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
           $limit = 10;
           $offset = ($page - 1) * $limit;
            // Filter
           $keyword = $_GET['keyword'] ?? '';
           $kelas = $_GET['kelas'] ?? '';
           $status = $_GET['status'] ?? '';
            // Get Data
           $siswa = $this->siswaService->getPaginatedSiswa($limit, $offset, $keyword, $kelas, $status);
           $totalSiswa = $this->siswaService->getSiswaCount($keyword, $kelas, $status);
           $totalPages = ceil($totalSiswa / $limit);

           require "../app/adminViews/siswa/daftarSiswa.php";
    }

    public function methodCreateDataSiswa()
    {
        $kelasList = $this->kelasService->listKelas();
        require "../app/adminViews/siswa/createDataSiswa.php";
    }
    public function editDataSiswa()
    {
        $id = $_GET['id'] ?? 0;

        $siswa = $this->siswaService->getSiswaById($id);
        $kelasList = $this->kelasService->listKelas();

        require "../app/adminViews/siswa/createDataSiswa.php";
    }

    public function updateDataSiswa()
    {
        try {
            $this->siswaService->methodUpdateDataSiswa($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function methodStoreDataSiswa()
    {


        try {
            $this->siswaService->methodCreateDataSiswa($_POST);
            header("Location: /?url=/siswa/createDataSiswa");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function methodDeleteDataSiswa()
    {
        $id = $_GET['id'] ?? 0;

        $result = $this->siswaService->methodDeleteDataSiswa($id);
    }


    public function jumlah_siswa_kelas()
    {
        $kelas = $this->siswaService->jumlah_siswa_kelas();
        require '../app/adminViews/kelas/daftarkelas.php';
        
    }
}
