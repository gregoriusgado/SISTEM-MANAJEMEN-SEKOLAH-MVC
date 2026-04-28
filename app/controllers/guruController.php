<?php

require_once __DIR__ . '/../services/guruService.php';


class guruController
{


    private $service;

    
    public function __construct()
    {
        $this->service = new guruService();
    }

    // FUNGSI UNTUK MENAMPILKAN SEMUA DATA GURU
    public function daftarGuru()
    {
        $guru = $this->service->getAllGuru();
        require "../app/adminViews/guru/daftarGuru.php";
    }

    // FUNGSI UNTUK MEMBUAT DATA GURU BARU
      public function methodCreateDataGuru()
    {
        require "../app/adminViews/guru/createDataGuru.php";
    }

    // FUNGSI UNTUK MENAMPILKAN DATA GURU BERDASARKAN ID
    public function methodEditDataGuru()
    {
        $id = $_GET['id'] ?? 0;
        $guru = $this->service->getGuruById($id);
        require "../app/adminViews/guru/createDataGuru.php";
    }

    // FUNGSI UNTUK MEMPERBARUI DATA GURU BERDASARKAN ID
    public function methodUpdateDataGuru()
    {
        try {
            $this->service->updateDataGuru($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    // FUNGSI UNTUK MENYIMPAN DATA GURU BARU
    public function methodStoreDataGuru()
    {

        try {
            $this->service->createDataGuru($_POST);
            header("Location: /?url=/guru/createDataGuru");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // FUNGSI UNTUK MENGHAPUS DATA GURU BERDASARKAN ID
    public function methodDeleteDataGuru()
    {
        $id = $_GET['id'] ?? 0;

        $result = $this->service->deleteDataGuru($id);
    }

}
