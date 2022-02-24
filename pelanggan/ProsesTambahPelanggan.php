<?php
if (isset($_POST)) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $tlp = $_POST['tlp'];

    if (empty($nama || $alamat || $jenisKelamin || $tlp)) {
        echo "<script>alert('Form wajib terisi penuh!'); location.href = 'tambahPelanggan.php';</script>";
    }

    include '../koneksi.php';
    $user_query = mysqli_query($conn, "select * from member where nama='" . $nama . "'");

    if (mysqli_num_rows($user_query) == 0) {
        $add_user_query = mysqli_query($conn, sprintf("INSERT INTO member (nama, alamat, jenis_kelamin, tlp) VALUES ('%s', '%s', '%s', '%s')", $nama, $alamat, $jenisKelamin, $tlp));
        header('location: tampilPelanggan.php');
    } else {
        echo "<script>alert('Nama sudah digunakan!'); location.href = 'tambahPelanggan.php';</script>";
    }
}