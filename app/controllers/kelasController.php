<?php

require_once __DIR__ . '/../services/kelasService.php';


class kelasController
{


    private $service;

    
    public function __construct()
    {
        $this->service = new kelasService();
    }

    public function daftarKelas()
    {
        $kelas = $this->service->getAllKelas();
        require "../app/adminViews/daftarKelas.php";
    }
    //   public function methodCreateDataGuru()
    // {
    //     require "../app/adminViews/guru/createDataGuru.php";
    // }
    // public function methodEditDataGuru()
    // {
    //     $id = $_GET['id'] ?? 0;
    //     $guru = $this->service->getGuruById($id);
    //     require "../app/adminViews/guru/createDataGuru.php";
    // }

    // public function methodUpdateDataGuru()
    // {
    //     try {
    //         $this->service->updateDataGuru($_POST);
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }


    // public function methodStoreDataGuru()
    // {


    //     try {
    //         $this->service->createDataGuru($_POST);
    //         header("Location: /?url=/guru/createDataGuru");
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }


    // public function methodDeleteDataGuru()
    // {
    //     $id = $_GET['id'] ?? 0;

    //     $result = $this->service->deleteDataGuru($id);
    // }

}
