# LP11DPBO2024C2

/* Saya Talitha Fayarina Adhigunawan [2201271] mengerjakan LP11 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. */

Pada LP11 ini menggunakan konsep MVP dengan emmbuat fitur CRUD untuk tabel yang sudah disediakan, dan tampilkan 2 kolom baru yaitu kolom email dan telepon yang sudah ada pada database. Namun saya baru berhasil pada delete.

Alur Program:
1. Index.php: Ini adalah file utama yang akan memulai program. Di sini, pertama-tama, kelas TampilPasien diinisialisasi untuk menampilkan data pasien. Jika ada permintaan untuk menghapus data pasien ($_GET['action'] === 'delete'), maka proses penghapusan diproses menggunakan metode hapusPasien dari kelas ProsesPasien.

2. ProsesPasien.php: Kelas ini bertanggung jawab untuk mengambil data dari database, memprosesnya, dan membuat objek Pasien untuk setiap baris data. Metode prosesDataPasien digunakan untuk mengambil data dari database menggunakan kelas TabelPasien dan menyimpannya dalam array. Kelas ini juga memiliki metode-metode untuk menambahkan, mengedit, dan menghapus data pasien dari database.

3. TampilPasien.php: Kelas ini mengimplementasikan antarmuka KontrakView yang berisi metode tampil. Metode ini menggunakan objek ProsesPasien untuk mengambil data pasien dan menghasilkan tabel HTML yang menampilkan data pasien beserta tombol edit dan hapus untuk setiap entri.

4. TambahPasienView.php: File ini mengelola tampilan untuk menambahkan pasien. Jika metode yang digunakan adalah POST, data pasien baru akan ditambahkan ke database menggunakan presenter TambahPasienPresenter. Jika bukan metode POST, maka formulir tambah pasien akan ditampilkan.

5. TambahPasienPresenter.php: Presenter ini menghubungkan antara model dan tampilan untuk proses penambahan pasien. Presenter menerima data dari tampilan, memanggil metode tambahPasien dari model PasienModel, dan kemudian mengembalikan hasilnya.

6. PasienModel.php: Kelas ini bertanggung jawab untuk mengakses database untuk operasi-operasi yang berkaitan dengan pasien, seperti menambahkan, mengedit, dan menghapus data pasien.

7. Pasien.class.php: Ini adalah model untuk objek Pasien. Kelas ini memiliki properti-properti untuk data pasien dan metode-metode untuk mengakses dan mengubah properti-propertinya.

8. TabelPasien.class.php: Kelas ini bertanggung jawab untuk mengambil data pasien dari tabel database. Ini berfungsi sebagai jembatan antara model Pasien dan database.

9. KontrakPresenter.php: Interface ini mendefinisikan kontrak yang harus diikuti oleh semua presenter. Ini memastikan bahwa setiap presenter harus memiliki metode-metode yang diperlukan untuk berinteraksi dengan tampilan.

10. DeletePresenter.php: Presenter ini bertanggung jawab untuk menghapus data pasien. Ini menerima id pasien yang akan dihapus dan memanggil metode hapusPasien dari model PasienModel untuk melakukan penghapusan.

Dokumentasi:
- Halaman Utama
![Screenshot (115)](https://github.com/faayyaa10/LP11DPBO2024C2/assets/114636102/e2602527-1de0-46f0-8315-852b2743f641)
  
- Berhasil Delete pasien no 8 yaitu Mark
![Screenshot (116)](https://github.com/faayyaa10/LP11DPBO2024C2/assets/114636102/e37ec902-d445-41e4-a176-3b1c3540c774)

