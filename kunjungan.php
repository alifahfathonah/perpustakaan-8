<br>
<br>
<br>
<br>
<br>

                                    		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2-rc.1/js/select2.min.js" type="text/javascript"></script>
   											 <script type="text/javascript">
       										 $(document).ready(function() 
       										 {
            										var cnames = ["Argentina", "Australia", "Austria", "Bangladesh", "Belgium", "Brazil", "Canada", "China", "Denmark", "Dominica", "Dominican Republic", "France", "Germany", "Hong Kong", "India", "Indonesia", "United Arab Emirates", "United Kingdom", "United States"];
           									$("#country").select2
           									({
              									data: cnames
            								});
        											});
    										</script>
    										<style>
        										#country {
            								width: 300px;
       										 }
   											 </style>


<div class="container">
	<form>
			<label for="nama">No Induk</label>
			<input type="text"> <button type="submit" class="btn btn-default">Submit</button><br><br>
			<label class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Lupa No Induk?</label>
			<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Data Siswa</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					 <div class="form-group">
                                    <label for="nim">Nama</label>
                                    <input type="text" class="form-control" name="nim" placeholder="Isikan NIM">
                                    </div>
                                    <div class="form-group">
                                    <label for="nama">Kelas</label><br>
                                    <select id="country"></select>
                                    </div>
                                    <div class="form-group">
                                    <label for="nama">Jurusan</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Isikan Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                    <label for="nama">Tahun Masuk</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Isikan Nama Lengkap">
                                    </div>
                                    <button type="submit" class="btn btn-info">Cari</button>
                                    <button type="reset" class="btn btn-info">Batal</button>
                                </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">kembali</button>
				</div>
			</div>
		</div>
	</form>


</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>