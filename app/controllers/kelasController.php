<?php

require_once __DIR__ . '/../services/kelasService.php';
require_once __DIR__ . '/../services/guruService.php';

class kelasController
{


    private $kelasService;
    private $guruService;


    public function __construct()
    {
        $this->kelasService = new kelasService();
        $this->guruService = new guruService();
    }

    public function daftarKelas()
    {
        $kelas = $this->kelasService->getAllKelas();
        require "../app/adminViews/kelas/daftarKelas.php";
    }
    public function methodCreateDaftarKelas()
    {   
        $guru_reguler = $this->guruService->guruReguler();
        require "../app/adminViews/kelas/createDataKelas.php";
    }
    public function methodEditDataKelas()
    {
        $id = $_GET['id'] ?? 0;
        $kelas = $this->kelasService->getKelasById($id);
        $guru_reguler = $this->guruService->guruReguler();
        $waliKelasSekarang = $kelas['wali_kelas_id'];
        $tingkatKelasSekarang = $kelas['tingkat'];
        require "../app/adminViews/kelas/createDataKelas.php";
    }

    public function methodUpdateDataKelas()
    {
        try {
            $this->kelasService->updateDataKelas($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function methodStoreDataKelas()
    {


        try {
            $this->kelasService->createDataKelas($_POST);
            header("Location: /?url=/guru/createDataKelas");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function methodDeleteDataKelas()
    {
        $id = $_GET['id'] ?? 0;

        $result = $this->kelasService->deleteDataKelas($id);
    }
}
