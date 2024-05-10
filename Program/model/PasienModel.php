<?php

include("DB.class.php");

class PasienModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function tambahPasien($pasien)
    {
        $nik = $pasien->getNik();
        $nama = $pasien->getNama();
        $tempat = $pasien->getTempat();
        $tl = $pasien->getTl();
        $gender = $pasien->getGender();
        $email = $pasien->getEmail();
        $telp = $pasien->getTelp();

        // Prepared statement untuk mencegah SQL injection
        $query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssssss", $nik, $nama, $tempat, $tl, $gender, $email, $telp);
        $result = $stmt->execute();
        
        if ($result) {
            return true;
        } else {
            // Tambahkan penanganan kesalahan jika eksekusi query gagal
            return false;
        }
    }

    public function hapusPasien($id)
    {
        // Buka koneksi ke database
        $this->db->open();
    
        // Prepared statement untuk mencegah SQL injection
        $query = "DELETE FROM pasien WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
    
        // Tutup koneksi ke database
        $this->db->close();
    
        // Periksa apakah query berhasil dieksekusi
        if ($result) {
            return true;
        } else {
            // Tambahkan penanganan kesalahan jika eksekusi query gagal
            return false;
        }
    }



}

?>
