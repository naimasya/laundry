<?php
if (isset($_POST)) {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    
    if (empty($jenis || $harga)) {
        echo "<script>alert('Form wajib terisi penuh!'); location.href = 'tambahPaket.php';</script>";
    }

    include '../koneksi.php';
    $user_query = mysqli_query($conn, "select * from paket where id='" . $id . "'");

    if (mysqli_num_rows($user_query) == 0) {
        $add_user_query = mysqli_query($conn, sprintf("INSERT INTO paket (jenis, harga) VALUES ('%s', '%s')", $jenis, $harga));
        header('location: tampilPaket.php');
    } else {
        echo "<script> location.href = 'tambahPaket.php';</script>";
    }
}