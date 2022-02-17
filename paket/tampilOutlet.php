<?php
include ("../header.php");
include ("../login_guard.php");

allow_page_access_exclusive(["admin","kasir"]);
?>
<link rel="stylesheet" href="../css/tampil.css">

    <div class="judul">
    <h3 align = "center">OUTLET</h3>
    </div>
    <div class="table">
    <table class="table table-striped">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>AKSI</th>
    </tr>
<body background = '../laundrybackground.jpg'>
    <?php include "../koneksi.php" ?>

        <tbody>
            <?php
            include "../koneksi.php";

            $qry_outlets = mysqli_query($conn, "select * from outlet");

            $no = 0;
            while ($outlet_data = mysqli_fetch_array($qry_outlets)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $outlet_data['nama'] ?></td>
                    <td><?= $outlet_data['alamat'] ?></td>
                    <td><?= $outlet_data['tlp'] ?></td>
                    <td><a href="ubahOutlet.php?id=<?= $outlet_data['id'] ?>" class="btn btn-success">Ubah</a> | <a href="hapusOutlet.php?id=<?= $outlet_data['id'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer src="../components/navbar.js"></script>
</body>
<a href="tambahOutlet.php" class="btn btn-success">Tambah</a>
</html>