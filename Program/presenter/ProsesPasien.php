<?php

include("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']); //mengisi email
				$pasien->setTelp($row['telp']); //mengisi nomor telepon


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	public function tambahPasien($nik, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        // Logika untuk menambahkan data pasien ke database
        // Disesuaikan dengan implementasi database Anda
        $db = new DB("localhost", "root", "", "mvp_php");
        $db->open();
        $query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) VALUES ('$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
        $result = $db->execute($query);
        $db->close();
        return $result;
    }

    public function editPasien($id, $nik, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        // Logika untuk mengedit data pasien di database
        // Disesuaikan dengan implementasi database Anda
        $db = new DB("localhost", "root", "", "mvp_php");
        $db->open();
        $query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";
        $result = $db->execute($query);
        $db->close();
        return $result;
    }


    public function hapusPasien($id)
    {
        // Logika untuk menghapus data pasien dari database
        // Disesuaikan dengan implementasi database Anda
        $db = new DB("localhost", "root", "", "mvp_php");
        $db->open();
        $query = "DELETE FROM pasien WHERE id='$id'";
        $result = $db->execute($query);
        $db->close();
        return $result;
    }

	
	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}

	function getEmail($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}

	function getTelp($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
