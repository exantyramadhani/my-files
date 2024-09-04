<?php
	@$IdMenu = $_GET['IdMenu'];
	if (empty($IdMenu)){
	  ?>
		<script type="text/javascript">
			window.location.href="?p=list_barang";
		</script>
	  <?php
	}

	$sql = "SELECT * FROM menu WHERE IdMenu= '$IdMenu'";
	$query = mysqli_query($koneksi, $sql);
	$cek = mysqli_num_rows($query);
	if($cek > 0 ){
		$data = mysqli_fetch_array($query);
	} else {
		$data = NULL;
	}

?>

<div class="row">
	<h2>Edit Menu</h2>
	<div class="col-lg-4">
		<form action="" method="post" class="form">
			<div class="from-group">
				<label>Nama Menu</label>
				<input type="text" name="NamaMenu"  class="form-control" placeholder="Masukkan Nama Menu" value="<?= $data['NamaMenu'] ?>">
			</div>

			<div class="from-group">
				<label>Harga</label>
				<input type="number" name="Harga"  class="form-control" value="<?= $data['Harga'] ?>">
			</div>

			<div class="from-group">
				<input type="submit" class="btn btn-md btn-primary" name="simpan" value="simpan">
				<a href="?p=list_barang" class="btn btn-md btn-default">Kembali</a>
			</div>
		</form>

		<?php
		   if(isset($_POST['simpan'])){
			 $NamaMenu = $_POST['NamaMenu'];
			 $Harga = $_POST['Harga'];
			 $sql_update = "UPDATE menu SET NamaMenu='$NamaMenu', Harga='$Harga' WHERE IdMenu= '$IdMenu'";
			 $q = mysqli_query($koneksi, $sql_update);
			 if($q){
				?>
				<script type="text/javascript">
					window.location.href="?p=list_barang";
				</script>
				<?php
			}else{
			?>
				<div class="alert alert-success">
					Gagal Menyimpan.
				</div>
				<?php	
			}
		}
		?>

	</div>
</div>