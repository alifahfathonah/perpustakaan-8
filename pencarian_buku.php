
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
                        echo '<p align="center"><b>'.$data['id_buku'].'</b></p>';
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
                        ?><center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-id='<?php echo $data['id_buku']?>'>Lihat Detail</button></center>';
<?php
                        echo '</tr>';
                        echo '</table>';
                        echo '</div>';
                        echo '</div>';
                        $no++;  
                      }
                    }
              
                ?>
    </form>
</div>


 

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">

      
     <div class="modal-content">
          <div class="modal-header" style="background-color:#228B22";>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <p align="center"><font size="2px"><i>Sistem Informasi Perpustakaan SMK Patriot 2 Bekasi</i></font></p>
            <h4 class="modal-title" align="center"><b>Lihat Detail Buku</b></h4>
          </div>
      <div class="modal-body" >
         <div class="modal-data">
         </div>
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
                        ?>
                          <center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-id="<?php echo $data['id_buku'] ?>">Lihat Detail</button></center>
                        <?php
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
                           echo '</div>';
                          echo '</div>';
                          echo '</tr>';
                          $no++;  
                        }
                      }

                            ?>
                          
<div class="container">                          
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

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<!-- Ini merupakan script yang terpenting -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var getDetail = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : 'detail_buku.php',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'getDetail='+ getDetail,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                  $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>