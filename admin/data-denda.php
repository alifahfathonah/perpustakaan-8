<style>
  .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
  }
 
  .table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
  }
 
  .table1, th, td {
    padding: 8px 20px;
    text-align: center;
  }
 
  .table1 tr:hover {
    background-color: #f5f5f5;
  }
 
  .table1 tr:nth-child(even) {
    background-color: #f2f2f2;
  }

</style>
<div class="main-panel">
<div class="col-md-12" style="padding:0px">
  <ol class="breadcrumb" style="margin:0;border-radius:0;">
    <li class="active"><a href="admin.php?content=home-admin">Home</a> / Data Denda</li>
  </ol>
</div>
   
<div class="col-md-12" style="min-height:500px">
  <h3><b>Data</b> Denda</h3>
  <hr>
  <form class="form-inline" action="" method="POST">
    <div class="form-group" style="float: right;">
      <input size="129px" type="text" name="pencarian" class="form-control" placeholder="Pencarian">
      <button type="submit" class="btn btn-primary"><i class="fa fa-search fa-fw"></i></button>
      <a href=""><button type="button" class="btn btn-warning"><i class="fa fa-refresh fa-fw"></i></button></a>
    </div>
  </form>
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle fa-fw"></i>Tambah Denda</button> -->
    <br><br>
    <form class="form-horizontal" method="POST">
      <table class="table1 table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Nomor Induk</th>
            <th>Jumlah Denda</th>
            <th>Tanggal Peminjaman</th>
            <th colspan="2"><center>Action</center></th>
          </tr>
        </thead>
        <tbody> 
          <?php

           error_reporting(0);

            include '../config/koneksi.php';

            $batas  = 10;
            $hal    = @$_GET['hal'];
            if (empty($hal)) {
              $posisi = 0; 
              $hal    = 1;
            } else {
              $posisi = ($hal - 1) * $batas;
            } 
            if($_SERVER['REQUEST_METHOD'] == "POST") {
              $pencarian = trim(mysqli_real_escape_string($konek, $_POST['pencarian']));
              if ($pencarian != '') {
                $sql = "SELECT DISTINCT tbl_dendaa.id_denda, tbl_dendaa.jml_denda, tbl_pinjam.no_induk, tbl_pinjam.tgl_pinjam FROM tbl_dendaa, tbl_pinjam WHERE tbl_pinjam.id_pinjam=tbl_dendaa.id_pinjam AND status_denda='0' AND no_induk LIKE '%$pencarian%'"; 
                $query = $sql;
                $queryJml = $sql;
              } else {
                $query = "SELECT DISTINCT tbl_dendaa.id_denda, tbl_dendaa.jml_denda, tbl_pinjam.no_induk, tbl_pinjam.tgl_pinjam FROM tbl_dendaa, tbl_pinjam WHERE tbl_pinjam.id_pinjam=tbl_dendaa.id_pinjam AND status_denda='0' LIMIT $posisi, $batas ";
                $queryJml = "SELECT DISTINCT tbl_dendaa.id_denda, tbl_dendaa.jml_denda, tbl_pinjam.no_induk, tbl_pinjam.tgl_pinjam FROM tbl_dendaa, tbl_pinjam WHERE tbl_pinjam.id_pinjam=tbl_dendaa.id_pinjam AND status_denda='0'";
                $no = $posisi + 1;
              }
            } else {
              $query ="SELECT DISTINCT tbl_dendaa.id_denda, tbl_dendaa.jml_denda, tbl_pinjam.no_induk, tbl_pinjam.tgl_pinjam FROM tbl_dendaa, tbl_pinjam WHERE tbl_pinjam.id_pinjam=tbl_dendaa.id_pinjam AND status_denda='0' LIMIT $posisi, $batas ";
              $queryJml = "SELECT DISTINCT tbl_dendaa.id_denda, tbl_dendaa.jml_denda, tbl_pinjam.no_induk, tbl_pinjam.tgl_pinjam FROM tbl_dendaa, tbl_pinjam WHERE tbl_pinjam.id_pinjam=tbl_dendaa.id_pinjam AND status_denda='0'";
              
              $no = $posisi + 1;
            } 
            $querydata = mysqli_query($konek, $query)or die(mysqli_error());
                    if(mysqli_num_rows($querydata) == 0){
                      echo '<tr><td colspan="6" align="center">Tidak ada data!</td></tr>';
                    }
                      else 
                    {
                      $no = 1;
                      while($data = mysqli_fetch_array($querydata)){
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$data['no_induk'].'</td>';
                        echo '<td>'.$data['jml_denda'].'</td>';
                        echo '<td>'.$data['tgl_pinjam'].'</td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="right" title="Edit Keterangan" href=admin.php?content=edit-denda&&id_denda='.$data['id_denda'].'&&id_pinjam='.$data['id_pinjam'].'><i class="fa fa-edit fa-fw"></i></a></td>';
                        echo '<td  width="20"><a data-toggle="tooltip" data-placement="left" title="Delete" href=../config/delete-denda.php?id_denda='.$data['id_denda'].'><i class="fa fa-trash fa-fw"></i></a></td>';
                        echo '</tr>';
                        $no++;
                      }
                    }

                ?>

        </tbody>
      </table>
      <?php
     if($_SERVER['REQUEST_METHOD'] == "POST") {
            $pencarian = trim(mysqli_real_escape_string($konek, $_POST['pencarian']));
        echo "<div style=\"float:left;\">";
        $jml = mysqli_num_rows(mysqli_query($konek, $queryJml));
        echo "Data Hasil Pencarian: <b>$jml</b>";
        echo "</div>";
      } else { ?>
        <div style="float:left;">
          <?php
          $jml = mysqli_num_rows(mysqli_query($konek, $queryJml));
          echo "Jumlah Data: <b>$jml</b>";
          ?>
        </div>
        <div style="float:right;">
          <ul class="pagination pagination-sm" style="margin: 0">
            <?php
            $jml_hal = ceil($jml / $batas);
            for ($i=1; $i <= $jml_hal; $i++) {
              if ($i != $hal) {
                echo "<li><a href=\"admin.php?content=data-denda&&hal=$i\">$i</a></li>";
              } else {
                echo "<li class=\"active\"><a>$i</a></li>";
              }
            }
            ?>
          </ul>
        </div>
        <?php
      }
?>
    </form>
</div>
</div>



    