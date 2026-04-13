<?php



require_once __DIR__ . '/../models/kelasModel.php';

class kelasService
{

    private $kelasModel;

    public function __construct()
    {
        $this->kelasModel = new kelasModel();
    }

    public function getAllKelas() {
          return $this->kelasModel->getAllKelas();
    }

    public function kelasBulanan()
    {
        return $this->kelasModel->kelasBulanan();
        return $result['total'];
    }
}
