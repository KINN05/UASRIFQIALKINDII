<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$id = $_POST["id_tipe"];
$nm_tipe = $_POST["nama_tipe"];


#3. Query Insert (proses tambah data)
$query = "UPDATE tipe_kendaraan SET nama_tipe='$nm_tipe' 
WHERE id_tipe='$id'";

$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
