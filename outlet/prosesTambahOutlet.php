<?php
if (isset($_POST)) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];

    if (empty($nama || $alamat || $tlp)) {
        echo "<script>alert('Form wajib terisi penuh!'); location.href = 'tambahOutlet.php';</script>";
    }

    include '../koneksi.php';
    $query = sprintf("INSERT INTO outlet (nama, alamat, tlp) VALUES ('%s', '%s', '%s')", $nama, $alamat, $tlp);

    if (mysqli_query($conn, $query)){
        header('location: tampilOutlet.php');
    }
     else {
        echo "<script> location.href = 'tambahOutlet.php';</script>";
    }
    print_r($_POST);
}