<?php
include ("header.php");
include ("login_guard.php");

allow_page_access_exclusive(["admin", "kasir","owner"]);
?>

<h3 align = "center">OUTLET</h3>
    
    <div class="table">
    <table class="table table-striped">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
    </tr>
<body>
    <?php include "koneksi.php" ?>

        <tbody>
            <?php
            include "koneksi.php";

            $qry_outlets = mysqli_query($conn, "select * from outlet");

            $no = 0;
            while ($outlet_data = mysqli_fetch_array($qry_outlets)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $outlet_data['nama'] ?></td>
                    <td><?= $outlet_data['alamat'] ?></td>
                    <td><?= $outlet_data['tlp'] ?></td>
                    
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <h3 align = "center">LIST HARGA PAKET LAUNDRY</h3>
    <div class="table">
    <table class="table table-striped">
    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Jenis</th>
        <th>Harga</th>
    </tr>

<body>
    <?php include "koneksi.php" ?>

    <table class="table table-hover table-striped">
        <tbody>
            <?php
            include "koneksi.php";

            $qry_pakets = mysqli_query($conn, "select * from paket");

            $no = 0;
            while ($paket_data = mysqli_fetch_array($qry_pakets)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $paket_data['jenis'] ?></td>
                    <td><?= $paket_data['harga'] ?></td>
                   
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

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
        </tr>
<body>
    <?php 
    include "koneksi.php" 
    ?>
        <tbody>
            <?php
            include "koneksi.php";

            $qry_users = mysqli_query($conn, "select * from user");

            $no = 0;
            while ($user_data = mysqli_fetch_array($qry_users)) {
                $no++; ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $user_data['nama'] ?></td>
                    <td><?= $user_data['username'] ?></td>
                    <td><?= $user_data['role'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

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
        </tr>
<body>
    <?php include "koneksi.php" ?>
        <tbody>
            <?php
            include "koneksi.php";

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
                    
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>


    <h3 align = "center">LIST TRANSAKSI</h3>
    </div>
    <div class="table">
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>NO</th>
                <th>NAMA PELANGGAN</th>
                
                <th>TGL</th>
                <th>BATAS WAKTU</th>
                <th>TGL BAYAR</th>
                
                <th>STATUS</th>
                <th>DIBAYAR</th>
                <th>JENIS</th>
                <th>QTY</th>

                <th>JUMLAH</th>
                

            </tr>

        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            
            $qry_transaksi=mysqli_query($conn,"select t.id as id, m.nama as nama_member, t.tgl as tgl, batas_waktu, tgl_bayar, status, dibayar from transaksi t, member m where t.id_member = m.id");
            echo mysqli_error($conn);
            $no=0;
            while($data_transaksi=mysqli_fetch_array($qry_transaksi)){
                $qry_detil_transaksi=mysqli_query($conn,"select *, detil_transaksi.qty * paket.harga as total from detil_transaksi, paket where id_transaksi = ".$data_transaksi['id']." AND paket.id = detil_transaksi.id_paket");
                $jumlah_pesanan = mysqli_num_rows($qry_detil_transaksi);

                $no++;

                $i = 0;
                while($data_dtl_transaksi = mysqli_fetch_array($qry_detil_transaksi)) {
                    $i++;
                    if ($i == 1) {
                ?>
                <tr>
                    
                    <td><?=$no?></td>
            
                    <td><?=$data_transaksi['nama_member']?></td>
                    <td><?=$data_transaksi['tgl']?></td>
                    <td><?=$data_transaksi['batas_waktu']?></td>
                    <td><?=$data_transaksi['tgl_bayar']?></td>
                    <td><?=$data_transaksi['status']?></td>
                    <td><?=$data_transaksi['dibayar']?></td>
                    <td><?=$data_dtl_transaksi['jenis']?></td>
                    <td><?=$data_dtl_transaksi['qty']?></td>
                    <td><?=$data_dtl_transaksi['total']?></td>

                    
                </tr>
   <?php
                    } else {
?>
                                    <tr>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?=$data_dtl_transaksi['jenis']?></td>
                    <td><?=$data_dtl_transaksi['qty']?></td>
                    <td><?=$data_dtl_transaksi['total']?></td>

                    <td>
                    </td>
                </tr>

<?php
                    }
            }}
         ?>
        </tbody>

    </table>

    