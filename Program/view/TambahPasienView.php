<?php

include("../model/PasienModel.php");
include("../presenter/TambahPasienPresenter.php");
include("../model/DB.class.php");

$pasienModel = new PasienModel(new DB('localhost', 'root', '', 'mvp_php'));
$tambahPasienPresenter = new TambahPasienPresenter($pasienModel);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    $result = $tambahPasienPresenter->tambahPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp);

    $tambahPasienView = new TambahPasienView();
    $tambahPasienView->tampilkanPesan($result);
} else {
    // Jika bukan metode POST, tampilkan formulir tambah pasien
    $form = <<<DATA_FORM
    <form method="POST" action="TambahPasienView.php">
        <table>
            <tr>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Tempat</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Telepon</th>
            </tr>
            <tr>
                <td><input type="text" name="nik"></td>
                <td><input type="text" name="nama"></td>
                <td><input type="text" name="tempat"></td>
                <td><input type="date" name="tl"></td>
                <td><select name="gender">
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select></td>
                <td><input type="email" name="email"></td>
                <td><input type="text" name="telp"></td>
            </tr>
            <tr>
                <td colspan="7"><input type="submit" value="Tambah Pasien"></td>
            </tr>
        </table>
    </form>
DATA_FORM;

// Ganti placeholder DATA_FORM dengan formulir yang telah dibuat
$tpl = new Template(file_get_contents("skinform.html"));
$tpl->replace("DATA_FORM", $form);
$tpl->write();
}

class TambahPasienView
{
    public function tampilkanPesan($result)
    {
        if ($result) {
            echo "Pasien berhasil ditambahkan.";
        } else {
            echo "Gagal menambahkan pasien.";
        }
    }
}

?>
