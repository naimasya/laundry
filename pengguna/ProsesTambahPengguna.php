<?php
if (isset($_POST)) {
    $fullname = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = null;

    if ($_POST['role'] == 'owner') $role = 'owner';
    elseif ($_POST['role'] == 'admin') $role = 'admin';
    else $role = 'kasir';

    if (empty($nama || $username || $password || $role)) {
        echo "<script>alert('Form wajib terisi penuh!'); location.href = 'new_user.php';</script>";
    }

    include '../koneksi.php';
    $user_query = mysqli_query($conn, "select * from user where username='" . $username . "'");

    if (mysqli_num_rows($user_query) == 0) {
        $add_user_query = mysqli_query($conn, sprintf("INSERT INTO user (nama, username, password, role) VALUES ('%s', '%s', '%s', '%s')", $fullname, $username, md5($password), $role));
        header('location: tampilPengguna.php');
    } else {
        echo "<script>alert('Username sudah digunakan!'); location.href = 'tambahPengguna.php';</script>";
    }
}