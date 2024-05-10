<?php

include("../model/PasienModel.php");

class TambahPasienPresenter
{
    private $pasienModel;

    public function __construct($pasienModel)
    {
        $this->pasienModel = $pasienModel;
    }
    public function tambahPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        // Memanggil metode yang sudah ada di ProsesPasien.php
        return $this->tambahPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);
    }
    
}

?>
