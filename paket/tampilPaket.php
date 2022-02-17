<?php
include ("../header.php");
include ("../login_guard.php");

allow_page_access_exclusive(["admin"]);
?>
<link rel="stylesheet" href="../css/tampil.css">

    <div class="judul">
    <h3 align = "center">LIST HARGA PAKET LAUNDRY</h3>
    </div>
    <div class="table">
    <table class="table table-striped">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Jenis</th>
        <th>Harga</th>
        <th>AKSI</th>
    </tr>

<body background = '../laundrybackground.jpg'>
    <?php include "../koneksi.php" ?>

    <table class="table table-hover table-striped">
        <tbody>
            <?php
            include "../koneksi.php";

            $qry_pakets = mysqli_query($conn, "select * from paket");

            $no = 0;
            while ($paket_data = mysqli_fetch_array($qry_pakets)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $paket_data['jenis'] ?></td>
                    <td><?= $paket_data['harga'] ?></td>
                    <td><a href="ubahPaket.php?id=<?= $paket_data['id'] ?>" class="btn btn-success">Ubah</a> | <a href="hapusPaket.php?id=<?= $paket_data['id'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer src="../components/navbar.js"></script>
</body>
<a href="tambahPaket.php" class="btn btn-success">Tambah</a>
</html>