<div class="main-panel">
<div class="col-md-12" style="padding:0px">
  <ol class="breadcrumb" style="margin:0;border-radius:0;">
    <li class="active"><!-- <a href="tu.php?content=home-tata-usaha"> -->Home</a> / Laporan Kunjungan</li>
  </ol>
</div>

<div class="col-md-12" style="min-height:500px">
  <h3><b>Laporan</b> Kehilangan </h3>
    <hr>
        <form class="form-horizontal" method="POST">
        <!-- <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran?>"> -->
          <div class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">Laporan Kunjungan </div>
            <div class="panel-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Nomor Induk</th>
                </thead>
                <tbody>
                   <?php

                      include '../config/koneksi.php';

                      
                      $query = mysqli_query($konek, "SELECT DISTINCT * FROM tbl_kunjungan")or die(mysqli_error($konek));

                              if(mysqli_num_rows($query) == 0){
                                echo '<tr><td colspan="6" align="center">Tidak ada data!</td></tr>';
                              }
                                else
                              {
                                $no = 1;
                                while($data = mysqli_fetch_array($query)){
                                  echo '<tr>';
                                  echo '<td width="50">'.$no.'</td>';
                                  echo '<td>'.$data['tgl_kunjungan'].'</td>';
                                  echo '<td>'.$data['no_induk'].'</td>';
                                  $no++;
                                }
                              }

                          ?>
              </tbody>
              </table>
              <p align="right">
                <a target ="_blank" role="button" href="print-kunjungan.php"><button type="button" class="btn btn-success"><i class="fa fa-print fa-fw"></i> Print</button></a>  
              </p>
            </div>
          </div>
      </form>

  </div>
</div>
</div>
</div>
</div>

