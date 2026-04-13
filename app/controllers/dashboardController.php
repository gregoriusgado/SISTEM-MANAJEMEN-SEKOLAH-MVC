<?php

require_once __DIR__ . '/../services/siswaService.php';
require_once __DIR__ . '/../services/guruService.php';
require_once __DIR__ . '/../services/staffService.php';
require_once __DIR__ . '/../services/kelasService.php';





class dashboardController
{

    private $siswaService;
    private $guruService;
    private $staffService;
    private $kelasService;

    public function __construct()
    {
        $this->siswaService = new siswaService();
        $this->guruService = new guruService();
        $this->staffService = new staffService();
        $this->kelasService = new kelasService();
    }

    public function dash_index()
    {
        $siswa = $this->siswaService->getAllSiswa();
        $siswaBulanan = $this->siswaService->siswaBulanan();

        $guru = $this->guruService->getAllGuru();
        $guruBulanan = $this->guruService->guruBulanan();
        
        $staff = $this->staffService->getAllStaff();
        $staffBulanan = $this->staffService->staffBulanan();

        $kelas = $this->kelasService->getAllKelas();
        $kelasBulanan = $this->kelasService->kelasBulanan();
        require "../app/index.php";
    }
}
