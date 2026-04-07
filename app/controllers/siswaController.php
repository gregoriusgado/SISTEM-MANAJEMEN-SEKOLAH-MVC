<?php

require_once __DIR__ . '/../services/siswaService.php';


class siswaController
{
    private $service;


    public function __construct()
    {
        $this->service = new siswaService();
    }

    public function index()
    {
        $siswa = $this->service->getAllSiswa();
        require "../app/adminViews/siswa/index.php";
    }

    public function methodCreateDataSiswa()
    {
        require "../app/adminViews/siswa/createDataSiswa.php";
    }
    public function editDataSiswa()
    {
        $id = $_GET['id'] ?? 0;
        $siswa = $this->service->getSiswaById($id);
        require "../app/adminViews/siswa/createDataSiswa.php";
    }

    public function updateDataSiswa()
    {
        try {
            $this->service->methodUpdateDataSiswa($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function methodStoreDataSiswa()
    {


        try {
            $this->service->methodCreateDataSiswa($_POST);
            header("Location: /?url=/siswa/createDataSiswa");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }







    public function methodDeleteDataSiswa()
    {
        $id = $_GET['id'] ?? 0;

        $result = $this->service->methodDeleteDataSiswa($id);
    }
}
