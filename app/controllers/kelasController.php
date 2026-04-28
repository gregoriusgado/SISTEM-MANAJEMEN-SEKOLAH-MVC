<?php

require_once __DIR__ . '/../services/kelasService.php';
require_once __DIR__ . '/../services/guruService.php';
require_once __DIR__ . '/../services/siswaService.php';

class kelasController
{

    // Dependency Injection untuk layanan kelas, guru, dan siswa
    private $kelasService;
    private $guruService;
    private $siswaService;

    // Konstruktor untuk menginisialisasi layanan
    public function __construct()
    {
        $this->kelasService = new kelasService();
        $this->guruService = new guruService();
        $this->siswaService = new siswaService();
    }

    // Menampilkan daftar kelas
    public function daftarKelas()
    {
        $kelas = $this->kelasService->getAllKelas();

        require "../app/adminViews/kelas/daftarKelas.php";
        
    }
    // Menampilkan form untuk membuat kelas baru
    public function methodCreateDaftarKelas()
    {
        $guru_reguler = $this->guruService->guruReguler();
        require "../app/adminViews/kelas/createDataKelas.php";
    }

      // Memproses penyimpanan data kelas baru
    public function methodStoreDataKelas()
    {


        try {
            $this->kelasService->createDataKelas($_POST);
            header("Location: /?url=/guru/createDataKelas");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Menampilkan form untuk mengedit kelas
    public function methodEditDataKelas()
    {
        $id = $_GET['id'] ?? 0;
        $kelas = $this->kelasService->getKelasById($id);

        // Ambil data guru reguler untuk dropdown wali kelas
        $guru_reguler = $this->guruService->guruReguler();
        // Simpan nilai wali kelas dan tingkat kelas saat ini untuk pre-select di form
        $waliKelasSekarang = $kelas['wali_kelas_id'];
        $tingkatKelasSekarang = $kelas['tingkat'];

        require "../app/adminViews/kelas/createDataKelas.php";
    }

    // Memproses pembaruan data kelas
    public function methodUpdateDataKelas()
    {
        try {
            $this->kelasService->updateDataKelas($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    // Memproses penghapusan data kelas
    public function methodDeleteDataKelas()
    {
        // Ambil ID kelas dari query parameter
        $id = $_GET['id'] ?? 0;

        $result = $this->kelasService->deleteDataKelas($id);
    }

    // Menampilkan detail kelas
    public function detailKelas()
    {
        $id = $_GET['id'] ?? null;
        
        $kelas = $this->kelasService->getKelasById($id);
        $siswa = $this->siswaService->getSiswaByKelas($id);
    
        require '../app/adminViews/kelas/detail.php';
    }
}
