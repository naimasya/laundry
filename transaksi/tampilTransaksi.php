<?php
include ("../header.php");
include ("../login_guard.php");

allow_page_access_exclusive(["admin", "kasir"]);
?>


    <div class="judul">
    <h3>TAMPIL TRANSAKSI</h3>
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
        <body background = '../laundrybackground.jpg'>
            <?php
            include "../koneksi.php";
            
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
        </body>

    </table>
    <?php
include("../footer.php");
 ?>
 <a href="tambahTransaksi.php" class="btn btn-success">Tambah</a>