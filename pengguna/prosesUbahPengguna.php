<?php
if($_POST){
$nama=$_POST['nama'];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];

if(empty($nama)){
    echo "<script>alert('nama produk tidak boleh kosong');location.href='tampilPengguna.php';</script>";
} elseif(empty($username)){
    echo "<script>alert('username tidak boleh kosong');location.href='tampilPengguna.php';</script>";
}elseif(empty($role)){
    echo "<script>alert('role tidak boleh kosong');location.href='tampilPengguna.php';</script>";
} else {

    include "../koneksi.php";
    $qry_get_id = mysqli_query($conn, "select id from user where nama ='".$nama."'");
    $row_id = mysqli_fetch_array($qry_get_id);
    $id = $row_id['id'];

    $update=mysqli_query($conn,"update user set nama='".$nama."',username='".$username."',password='".md5($password)."',role='".$role."' where id = '".$id."' ") or die(mysqli_error($conn));
if($update){
    echo "<script>alert('Sukses update data');location.href='tampilPengguna.php';</script>";
} else {
    echo "<script>alert('Gagal update data');location.href='tampilPengguna.php?id=".$id."';</script>";
}
}
}
?>