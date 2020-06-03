<?php

    include 'config/koneksi.php';
    
    if($_POST['getDetail']) {
        $id_buku = $_POST['getDetail'];
        $query      = "SELECT * FROM tbl_buku WHERE id_buku = '$id_buku'";
        $querydata  = mysqli_query($konek, $query)or die(mysql_error());
        $data       = mysqli_fetch_array($querydata);
        // while ($data = mysqli_fetch_array($querydata)){       
?>
            <!-- Modal -->
            <form action="" class="form-horizontal">
                <div class="form-group">
                <center><img size="100" src="galeri/teknik-informatika.png"</center>
                
                </div>
                <div class="form-group">
                <label class="col-sm-1"></label>
                <label class="col-sm-3">Kode Buku</label>
                <label class="col-sm-1">:</label>
                <div class="col-sm-5">
                    <p>
                    <?php echo $data['kode_buku']; ?>
                    </p>
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-1"></label>
                <label class="col-sm-3">Judul</label>
                <label class="col-sm-1">:</label>
                <div class="col-sm-5">
                    <p><?php echo $data['judul']; ?></p>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1"></label>
                    <label class="col-sm-3">Nama Penerbit</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-5">
                    <p><?php echo $data['nama_penerbit']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1"></label>
                    <label class="col-sm-3">Pengarang</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-5">
                    <p><?php echo $data['pengarang']; ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1"></label>
                    <label class="col-sm-3">Tahun Terbit</label>
                    <label class="col-sm-1">:</label>
                    <div class="col-sm-5">
                    <p><?php echo $data['tahun_terbit']; ?></p>
                    </div>
                </div> 
            </form>
<?php

    }
?>