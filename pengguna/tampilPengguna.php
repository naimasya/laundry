<?php
include ("../header.php");
include ("../login_guard.php");

allow_page_access_exclusive(["admin"]);
?>
<link rel="stylesheet" href="../css/tampil.css">

    <div class="judul">
    <h3 align = "center">LIST PENGGUNA</h3>
    </div>
    <div class="table">
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>AKSI</th>
        </tr>
<body background = '../laundrybackground.jpg'>
    <?php 
    include "../koneksi.php" 
    ?>
        <tbody>
            <?php
            include "../koneksi.php";

            $qry_users = mysqli_query($conn, "select * from user");

            $no = 0;
            while ($user_data = mysqli_fetch_array($qry_users)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $user_data['nama'] ?></td>
                    <td><?= $user_data['username'] ?></td>
                    <td><?= $user_data['role'] ?></td>
                    <td><a href="ubahPengguna.php?id=<?= $user_data['id'] ?>" class="btn btn-success">Ubah</a> | <a href="hapusPengguna.php?id=<?= $user_data['nama'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer src="../components/navbar.js"></script>
</body>
<a href="tambahPengguna.php" class="btn btn-success">Tambah</a>
</html>