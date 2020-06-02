 <br>
<br>
<br>
<br>
<br>
<form align="center">
  <div class="form-inline">
  	<div class="form-group">
    	<input size="140px" type="text" name="search" class="form-control" placeholder="Masukkan judul buku"  id="myInput" onkeyup="myFunctioncari()">
      	<button class="btn btn-primary" onkeyup="myFunctioncari()" type="submit">
        Cari</button>
    </div>
  </div>
</form>

<br>
<br>
<br>
<div class="container">
 <form class="form-horizontal" method="POST" >
          <?php

            include 'config/koneksi.php';
           
            
           
            $query = mysqli_query($konek, "SELECT * FROM tbl_buku ORDER BY id_buku DESC")or die(mysqli_error());
                    if(mysqli_num_rows($query) == 0){ 
                      echo '<center><i>';
                      echo 'Belum ada post buku!';
                      echo '</i></center>';    
                    }
                      else
                    { 
                      $no = 1;        
                      while($data = mysqli_fetch_array($query)){  

                        echo '<div class="col-md-3">';
                        echo '<div class="panel panel-success">';
                        echo '<div class="panel-heading">';
                        echo '<p align="center"><b>'.$data['judul'].'</b></p>';
                        echo '</div>';
                        echo '<div class="panel-body"';
                        // echo '<img src="galeri/$data['gambar'] width="30" height="20" />';
                      ?>
                      
                      <p ><center><a data-toggle="tooltip" data-placement="top" title="Lihat Gambar" href="galeri/<?php echo $data['gambar'] ?>" target="_blank"><img src="galeri/<?php echo $data['gambar']?>" width="170" height="200"></center></a></p>
                      
                      <?php
                        echo '</div>';
                        echo '<table class="table" style="background-color: #f2f2f2;">';
                        echo '<tr>';
                        // echo '<td align="center">';
                        // echo '<center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Lihat Detail</button></center>';

                        echo '<p align="center">'.substr($data['buku'], 0,300).'&nbsp;<a data-toggle="tooltip" data-placement="bottom" title="Lihat Detail" href=index.php?content=lihat-detail&&id_buku='.$data['id_buku'].'>Lihat Detail ..</a></p>';

                        // echo '</td>';
                        // echo '<td><center></center></td>';
                        echo '</tr>';
                        echo '</table>';
                    ?>
                      <!-- <p><a data-toggle="tooltip" data-placement="top" title="Lihat Gambar" href="galeri/<?php echo $data['gambar'] ?>" target="_blank"><img src="galeri/<?php echo $data['gambar'] ?>"></a></p> -->  
                      <?php  
                        echo '<hr>';
                        echo '<tr>';
                        // echo '<td>'.'<center>'.$data['judul'].'</center>'.'</td>';
                        // echo '<td>'.$data['nama_penerbit'].'</td>';
                        // echo '<td>'.$data['pengarang'].'</td>';
                        // echo '<div class="judul"><p>'.$data['judul'].'</p></div>';
                        // echo '<p align="right"><font size="1px"><i>'.$data['tgl_update'].'&nbsp;&nbsp;&nbsp;</i></font></p>';
                         echo '</div>';
                        echo '</div>';
                        echo '</tr>';
                        $no++;  
                      }
                    }
              
                ?>
    </form>
</div>

<!-- <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

      
     <div class="modal-content">
          <div class="modal-header" style="background-color:#228B22";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p align="center"><font size="2px"><i>Sistem Informasi Perpustakaan SMK Patriot 2 Bekasi</i></font></p>
            <h4 class="modal-title" align="center"><b>Lihat Detail Buku</b></h4>
          </div>
      <div class="modal-body" >
          <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label class="col-sm-1"></label>
            <label class="col-sm-3">ISBN</label>
            <label class="col-sm-1">:</label>
            <div class="col-sm-5">
              <p>
                <?php
                   $query = mysqli_query($konek, "SELECT * FROM tbl_buku ORDER BY id_buku DESC")or die(mysqli_error());
                   while($data = mysqli_fetch_array($query)){  
                   echo '<p><b>'.$data['isbn'].'</b></p>';
                  }
                ?>
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
 -->

    <!--   <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Gambar</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
             <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
          </div>
      </div> -->
      <!-- <div class="form-group">
          <label class="col-sm-1"></label>
          <label class="col-sm-3">Jumlah Buku</label>
          <label class="col-sm-1">:</label>
          <div class="col-sm-5">
            <input type="number" class="form-control" name="jml_buku" placeholder="Jumlah Buku" required>
          </div>
      </div> -->
      <!-- <div class="form-group">
          <label class="control-label col-sm-4"></label>
          <div class="col-sm-6" align="right">
            <button class="btn btn-primary">Simpan</button>
          </div>
      </div> -->
    </form>
    </div>
          <div class="modal-footer">
            
          </div>
    </div>
    </div>
  </div>

 <?php

          include '../config/koneksi.php';
                       error_reporting(0);

                       $batas  = 4;
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
                           $sql = "SELECT * FROM tbl_buku WHERE id_buku AND judul LIKE '%$pencarian%' OR nama_penerbit LIKE '%$pencarian%' OR pengarang LIKE '%$pencarian%' ORDER BY id_buku DESC";

                              $query = $sql;
                              $queryJml = $sql;
                            } else {
                              $query = "SELECT * FROM tbl_buku ORDER BY id_buku DESC LIMIT $posisi, $batas ";
                              $queryJml = "SELECT * FROM tbl_buku ORDER BY id_buku DESC";
                              $no = $posisi + 1;
                            }
                          } else {
                            $query = "SELECT * FROM tbl_buku ORDER BY id_buku DESC LIMIT $posisi, $batas ";
                            $queryJml = "SELECT * FROM tbl_buku ORDER BY id_buku DESC";
                            $no = $posisi + 1;
                          }$querydata = mysqli_query($konek, $query)or die(mysqli_error());
                                    if(mysqli_num_rows($querydata) == 0){ 
                                      echo '<tr><td colspan="8" align="center">Tidak ada data!</td></tr>';    
                                    }
                                      else
                                    { 
                                      $no = 1;             
                        while($data = mysqli_fetch_array($query)){  
                          echo '<div class="col-md-3">';
                          echo '<div class="panel panel-success">';
                          echo '<div class="panel-heading">';
                          echo '<center>Buku</center>';
                          echo '</div>';
                          echo '<div class="panel-body"';
                          // echo '<img src="galeri/$data['gambar'] width="30" height="20" />';
                        ?>
                        
                        <p ><center><a data-toggle="tooltip" data-placement="top" title="Lihat Gambar" href="galeri/<?php echo $data['gambar'] ?>" target="_blank"><img src="galeri/<?php echo $data['gambar']?>" width="170" height="200"></center></a></p>
                        
                        <?php
                          echo '</div>';
                          echo '<table class="table" style="background-color: #f2f2f2;">';
                          echo '<tr>';
                          // echo '<td align="center">';
                          echo '<center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Lihat Detail</button></center>';
                          // echo '</td>';
                          // echo '<td><center></center></td>';
                          echo '</tr>';
                          echo '</table>';
                      ?>
                        <!-- <p><a data-toggle="tooltip" data-placement="top" title="Lihat Gambar" href="galeri/<?php echo $data['gambar'] ?>" target="_blank"><img src="galeri/<?php echo $data['gambar'] ?>"></a></p> -->  
                        <?php  
                          echo '<hr>';
                          echo '<tr>';
                          echo '<td>'.'<center>'.$data['judul'].'</center>'.'</td>';
                          // echo '<td>'.$data['nama_penerbit'].'</td>';
                          // echo '<td>'.$data['pengarang'].'</td>';
                          // echo '<div class="judul"><p>'.$data['judul'].'</p></div>';
                          // echo '<p align="right"><font size="1px"><i>'.$data['tgl_update'].'&nbsp;&nbsp;&nbsp;</i></font></p>';
                           echo '</div>';
                          echo '</div>';
                          echo '</tr>';
                          $no++;  
                        }
                      }

                            ?>
                          
                           
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
                echo "<li><a href=\"index.php?content=pencarian_buku&&hal=$i\">$i</a></li>";
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


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
