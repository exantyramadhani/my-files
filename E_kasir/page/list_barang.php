<h2>Daftar Barang</h2>
<hr>

<a class="btn btn-primary btn-md" href="?p=tambah_barang"> <span class="glyphicon glyphicon-plus"></span> </a>

<div style="float: right">
	<form method="get" class="form-inline">
		<input type="hidden" name="p" value="list_barang">
	    <input placeholder="cari disini" type="" name="cari" class="from-control">
	    <button type="submit" class="btn btn-sm btn-primary"> <span class="glyphicon glyphicon-search"></span> </button>
    </form>
</div>

<br>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Menu</th>
			<th>Harga</th>
			<th>Tanggal Ditambahkan</th>
			<th>Dirubah</th>
			<th>Opsi</th>
	    </tr>
    </thead>
    <tbody>

		<?php


			@$cari = $_GET['cari'];
			$q_cari = "";
			if(!empty($cari)){
				$q_cari .= " and NamaMenu like '%".$cari."%'";
			}


			$pembagian = 5;
			$page = isset($_GET['halaman']) ? (int) $_GET['halaman'] : 1;
			$mulai = $page > 1 ? $page * $pembagian - $pembagian : 0;


			$sql = "SELECT * FROM menu WHERE 1=1 $q_cari LIMIT $mulai,$pembagian";
			$query = mysqli_query($koneksi, $sql);

			$cek = mysqli_num_rows($query);
			//cari total
			$sql_total = "SELECT * FROM menu";
			$q_total = mysqli_query($koneksi, $sql_total);
			$total = mysqli_num_rows($q_total);
			$jumlahHalaman = ceil($total / $pembagian);

			if($cek > 0){
				$no = $mulai + 1;
				while ($data = mysqli_fetch_array($query)) {
					
				?>

					<tr>
						<td> <?= $no++ ?> </td>
						<td> <?= $data['NamaMenu'] ?> </td>
						<td> <?= $data['Harga'] ?> </td>
						<td> <?= $data['Created_at'] ?> </td>
						<td> <?= $data['Updated_at'] ?> </td>
						<td>
    			        <a onclick="return confirm('Yakin mau dihapus?')" class="btn btn-danger btn-sm" href="page/hapus_barang.php?IdMenu=<?= $data['IdMenu']?>"> <span  class="glyphicon glyphicon-trash"></span></a>
                        <a class="btn btn-info btn-sm" href="?p=edit_barang&IdMenu=<?= $data['IdMenu'] ?>"> <spam class="glyphicon glyphicon-edit"></spam> </a>
		                </td>
					</tr>

				<?php
				}
			}else {
				?>
					<tr>
						<td colspan="6">
							Tidak ada data!
						</td>
					</tr>
				<?php
			}
		?>

		
    	<!-- <tr>
    		<td>1</td>
    		<td>Geprek</td>
    		<td>4.000.000</td>
    		<td>12-09-2019</td>
    		<td>12-09-2019</td>
    		<td>
    			<a class="btn btn-danger btn-sm" href=""> <span  class="glyphicon glyphicon-trash"></span></a>
    		
<a class="btn btn-info btn-sm" href=""> <spam class="glyphicon glyphicon-edit"></spam> </a>
		    </td>
		</tr> -->
    </tbody>
</table> 
<div class="float-left">
	jumlah : <?= $total ?>
</div>
<!-- <?php echo $jumlahHalaman ?> -->
<div style="float: right;" class="">
	<nav aria-label="page navigation">
		<ul class="pagination">
			<li>
				<a href="?p=list_barang&halaman=<?= $page - 1 ?>" aria-label= "previous".>
				  <span aria-hiden="true">&laquo;</span>
				</a>
			</li>

			<?php

			  for ($i = 1; $i <= $jumlahHalaman; $i++){
			  	?>
			  	<li class="<?= ($i == $_GET['halaman'] ? 'active' : '') ?>"><a href="?p=list_barang&halaman=<?= $i ?>"> <?= $i ?></a></li>
			  	<?php

			  }

			?>

			<!-- <li><a href="#">1</a></li>
			<li><a href="#">2</a></li>	
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li> -->
			<li>
			  <a href="?p=list_barang&halaman=<?= $page + 1 ?> " aria-label="Next">
			  	<span aria-hiden="true">&loque;</span>
			  </a>
			</li>
		</ul>
	</nav>
</div>