<?php
if($_POST){
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

if(empty($jenis)){
    echo "<script>alert('jenis tidak boleh kosong');location.href='tampilPaket.php';</script>";
} elseif(empty($harga)){
    echo "<script>alert('harga tidak boleh kosong');location.href='tampilPaket.php';</script>";
} else {
include "../koneksi.php";

$qry_paket = mysqli_query($conn, "select id from paket where jenis ='".$jenis."'");
$row_paket = mysqli_fetch_array($qry_paket);
$id = $row_paket['id'];

$update=mysqli_query($conn,"update paket set jenis='".$jenis."',harga='".$harga."' where id = '".$id."' ") or die(mysqli_error($conn));
if($update){
    echo "<script>alert('Sukses update paket');location.href='tampilPaket.php';</script>";
} else {
    echo "<script>alert('Gagal update paket');location.href='tampilPaket.php?id=".$id."';</script>";
}
}
}
?>