<?php
#1. Meng-koneksikan PHP ke MySQL
include("../koneksi.php");

#2. Mengambil Value dari Form Tambah
$id = $_POST["id_kendaraan"];
$merk = $_POST["merk"];
$tipe = $_POST["tipe"];
$nama_unit = $_POST["nama_unit"];
$no_rangka = $_POST["no_rangka"];
$tahun = $_POST["tahun"];
$harga = $_POST["harga"];
$status = $_POST["status_stok"];
$nama_foto = $_FILES['foto']['name'];
$tmp_foto = $_FILES['foto']['tmp_name'];


if ($nama_foto != "") {
    #hapus foto
    $qry = "SELECT * FROM kendaraan WHERE id_kendaraan='$id'";
    $hapus_foto = mysqli_query($koneksi,$qry);
    $data = mysqli_fetch_array($hapus_foto);
    $nama_foto_hapus = $data['foto_unit'];
    $lokasi_foto = "../foto/$nama_foto_hapus";
    if (file_exists($lokasi_foto)) {
        unlink($lokasi_foto);
    }

    #3. Query Insert (proses tambah data)
    $query = "UPDATE kendaraan SET merks_id='$merk', tipes_id='$tipe', nama_unit='$nama_unit', 
    no_rangka='$no_rangka', tahun_produksi='$tahun', harga_jual='$harga', status_stok='$statusk',  foto_unit='$nama_foto' 
    WHERE id='$id'";

    #tambahkan foto
    move_uploaded_file($tmp_foto, "../fotosiswa/$nama_foto");
} else {
    #3. Query Insert (proses edit data)
    $query = "UPDATE biodata SET nama='$nama', nisn='$nisn', tempat_lahir='$t_lahir', 
    tgl_lahir='$tgl_lahir', alamat='$alamat', email='$email', jenis_kelamin='$jk',  jurusans_id='$jur', gelombangs_id='$gel' 
    WHERE id='$id'";
}

$tambah = mysqli_query($koneksi, $query);

#4. Jika Berhasil triggernya apa? (optional)
if ($tambah) {
    header("location:index.php");
} else {
    echo "Data Gagal ditambah";
}
