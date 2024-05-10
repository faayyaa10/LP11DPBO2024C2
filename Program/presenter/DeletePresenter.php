<?php
include("../model/PasienModel.php");

class DeletePresenter
{
    private $pasienModel;

    public function __construct($pasienModel)
    {
        $this->pasienModel = $pasienModel;
    }

    public function hapusPasien($id)
    {
        return $this->pasienModel->hapusPasien($id);
    }
}
?>
