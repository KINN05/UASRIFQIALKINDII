<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$merk = $_POST["merk"];
$tipe = $_POST["tipe"];
$nama_unit = $_POST["nama_unit"];
$no_rangka = $_POST["no_rangka"];
$tahun = $_POST["tahun"];
$harga = $_POST["harga"];
$status = $_POST["status_stok"];
$nama_foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];

#3. Query Insert (proses tambah data)
$query .= "INSERT INTO kendaraan (merks_id,tipes_id,nama_unit,no_rangka,tahun_produksi,harga_jual,status_stok,foto_unit)
    VALUE ('$merk','$tipe','$nama_unit','$no_rangka','$tahun','$harga','$status','$nama_foto')";

    

move_uploaded_file($tmp_foto,"../foto/$nama_foto");

$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
