<?php
include ("../header.php");
include ("../login_guard.php");

allow_page_access_exclusive(["admin","kasir"]);
?>
<link rel="stylesheet" href="../css/tampil.css">

    <div class="judul">
    <h3 align = "center">LIST PELANGGAN</h3>
    </div>
    <div class="table">
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>AKSI</th>
        </tr>
<body background = '../laundrybackground.jpg'>
    <?php include "../koneksi.php" ?>
        <tbody>
            <?php
            include "../koneksi.php";

            $qry_members = mysqli_query($conn, "select * from member");

            $no = 0;
            while ($member_data = mysqli_fetch_array($qry_members)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $member_data['nama'] ?></td>
                    <td><?= $member_data['alamat'] ?></td>
                    <td><?= $member_data['jenis_kelamin'] ?></td>
                    <td><?= $member_data['tlp'] ?></td>
                    <td><a href="ubahPelanggan.php?id=<?= $member_data['id'] ?>" class="btn btn-success">Ubah</a> | <a href="hapusPelanggan.php?id=<?= $member_data['id'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer src="../components/navbar.js"></script>
</body>
<a href="tambahPelanggan.php" class="btn btn-success">Tambah</a>
</html>