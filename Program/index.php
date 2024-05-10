<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


// Inisialisasi kelas ProsesPasien
$prosesPasien = new ProsesPasien();

// Tangani aksi hapus jika ada
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $prosesPasien->hapusPasien($id); // Panggil metode hapusPasien
    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman index.php
        header("Location: index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Gagal menghapus data.";
    }
}


$tp = new TampilPasien();
$data = $tp->tampil();

