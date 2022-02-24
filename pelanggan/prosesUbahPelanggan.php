<?php
if($_POST){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tlp = $_POST['tlp'];

if(empty($nama)){
    echo "<script>alert('nama tidak boleh kosong');location.href='tampilPelanggan.php';</script>";
} elseif(empty($alamat)){
    echo "<script>alert('alamat tidak boleh kosong');location.href='tampilPelanggan.php';</script>";
}elseif(empty($jenis_kelamin)){
    echo "<script>alert('jenisKelamin tidak boleh kosong');location.href='tampilPelanggan.php';</script>";
} elseif(empty($tlp)){
    echo "<script>alert('tlp tidak boleh kosong');location.href='tampilPelanggan.php';</script>";    
} else {

    include "../koneksi.php";
    $qry_get_id = mysqli_query($conn, "select id from member where nama ='".$nama."'");
    $row_id = mysqli_fetch_array($qry_get_id);
    $id = $row_id['id'];

    $update=mysqli_query($conn,"update member set nama='".$nama."',alamat='".$alamat."',jenis_kelamin='".$jenis_kelamin."',tlp='".$tlp."' where id = '".$id."' ") or die(mysqli_error($conn));
if($update){
    echo "<script>alert('Sukses update pelanggan');location.href='tampilPelanggan.php';</script>";
} else {
    echo "<script>alert('Gagal update pelanggan');location.href='tampilPelanggan.php?id=".$id."';</script>";
}
}
}
?>