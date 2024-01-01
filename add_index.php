<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<style>
		input {
			border-radius: 10px;
			border-color: silver;
		}
	</style>
	<title>Add Buku</title>
</head>

<?php
include_once("connect.php");
$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbit");
$pengarang = mysqli_query($mysqli, "SELECT * FROM pengarang");
$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");
?>

<body>


	<div class="row mt-5">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<a href="index.php">Go to Home</a>
					<br /><br />
					<form action="add_index.php" method="post" name="form1">
						<table class="table table-borderless">
							<tr>
								<td>ISBN</td>
								<td><input type="text" name="isbn"></td>
							</tr>
							<tr>
								<td>Judul</td>
								<td><input type="text" name="judul"></td>
							</tr>
							<tr>
								<td>Tahun</td>
								<td><input type="text" name="tahun"></td>
							</tr>
							<tr>
								<td>Penerbit</td>
								<td>
									<select name="id_penerbit">
										<?php
										while ($penerbit_data = mysqli_fetch_array($penerbit)) {
											echo "<option value='" . $penerbit_data['id_penerbit'] . "'>" . $penerbit_data['nama_penerbit'] . "</option>";
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Pengarang</td>
								<td>
									<select name="id_pengarang">
										<?php
										while ($pengarang_data = mysqli_fetch_array($pengarang)) {
											echo "<option value='" . $pengarang_data['id_pengarang'] . "'>" . $pengarang_data['nama_pengarang'] . "</option>";
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Katalog</td>
								<td>
									<select name="id_katalog">
										<?php
										while ($katalog_data = mysqli_fetch_array($katalog)) {
											echo "<option value='" . $katalog_data['id_katalog'] . "'>" . $katalog_data['nama'] . "</option>";
										}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Qty Stok</td>
								<td>
									<input type="text" name="qty_stok">
								</td>
							</tr>
							<tr>
								<td>Harga Pinjam</td>
								<td><input type="text" name="harga_pinjam"></td>
							</tr>
							<tr>
								<td></td>
								<td><input class="btn btn-primary" type="submit" name="Submit" value="Add"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php

	// Check If form submitted, insert form data into users table.
	if (isset($_POST['Submit'])) {
		$isbn = $_POST['isbn'];
		$judul = $_POST['judul'];
		$tahun = $_POST['tahun'];
		$id_penerbit = $_POST['id_penerbit'];
		$id_pengarang = $_POST['id_pengarang'];
		$id_katalog = $_POST['id_katalog'];
		$qty_stok = $_POST['qty_stok'];
		$harga_pinjam = $_POST['harga_pinjam'];

		include_once("connect.php");

		$result = mysqli_query($mysqli, "INSERT INTO `buku` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam');");

		header("Location:index.php");
	}
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>