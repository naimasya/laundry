<?php
if($_POST){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];

if(empty($nama)){
    echo "<script>alert('nama tidak boleh kosong');location.href='tampilOutlet.php';</script>";
} elseif(empty($alamat)){
    echo "<script>alert('alamat tidak boleh kosong');location.href='tampilOutlet.php';</script>";
} elseif(empty($tlp)){
    echo "<script>alert('tlp tidak boleh kosong');location.href='tampilOutlet.php';</script>";
} else {
include "../koneksi.php";

$qry_outlet = mysqli_query($conn, "select * from outlet where nama ='".$nama."'");
$row_outlet = mysqli_fetch_array($qry_outlet);
$id = $row_outlet['id'];

$update=mysqli_query($conn,"update outlet set nama='".$nama."',alamat='".$alamat."',tlp='".$tlp."' where id = '".$id."' ") or die(mysqli_error($conn));
if($update){
    echo "<script>alert('Sukses update outlet');location.href='tampilOutlet.php';</script>";
} else {
    echo "<script>alert('Gagal update outlet');location.href='tampilOutlet.php?id=".$id."';</script>";
}
}
}
?>