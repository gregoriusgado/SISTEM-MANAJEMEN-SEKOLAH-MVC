<?php

require_once __DIR__ . '/../services/staffService.php';

class staffController
{

  private $service;
    public function __construct()
    {
        $this->service = new staffService();
    }

  public function daftarStaff()
  {
    $staff = $this->service->getAllStaff();
    require "../app/adminViews/staff/daftarStaff.php";
  }

    public function methodCreateDataStaff()
    {
        require "../app/adminViews/staff/createDataStaff.php";
    }
 
      public function methodEditDataStaff()
    {
        $id = $_GET['id'] ?? 0;
        $staff = $this->service->getStaffById($id);
        require "../app/adminViews/staff/createDataStaff.php";
    }
      public function methodUpdateDataStaff()
    {
        try {
            $this->service->updateDataStaff($_POST);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
      public function methodStoreDataStaff()
    {

        try {
            $this->service->createDataStaff($_POST);
            header("Location: /?url=/staff/createDataStaff");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
     public function methodDeleteDataStaff()
    {
        $id = $_GET['id'] ?? 0;

        $result = $this->service->deleteDataStaff($id);
    }


}
