<?php
	include "../config/koneksi.php";

	$IdMenu = $_GET['IdMenu'];
	// echo $IdMenu;
	// exit;
	$sql = "DELETE FROM menu WHERE IdMenu= '$IdMenu'";
	$query = mysqli_query($koneksi, $sql);
	if ($query){
		?>
		<script type="text/javascript">
			window.location.href="../index.php?p=list_barang";
		</script>
		<?php
	}else{
		?>
			<script type="text/javascript">
				alert('Terjadi Kesalahan!')
				window.location.href="../index.php?p=list_barang";
			</script>
		<?php
	}

?>