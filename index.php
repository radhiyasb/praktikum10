<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" href="../bootstrap/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

	<div class="container-lg my-5">

		<!-- Button -->

		<a href="printExcel.php" class="btn btn-success mb-2">
			<i class="fas fa-clipboard"></i>
			Print Excel
		</a>

		<!-- Tabel -->

		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<tr>	
					<th scope="col">ID Pendaftaran</th>
					<th scope="col">Tanggal Pendaftaran</th>
					<th scope="col">Nama</th>
					<th scope="col">Jenis Kelamin</th>
					<th scope="col">Tempat Lahir</th>
					<th scope="col">Tanggal Lahir</th>
					<th scope="col">NIK</th>
				</tr>
			</thead>
			<tbody>
				
				<?php

					include('koneksi.php');

					$query = "  SELECT id_pendaftaran, tanggal_pendaftaran, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, nik
								FROM tbl_pesertadidik
								ORDER BY tanggal_pendaftaran DESC  ";
					$result = mysqli_query($koneksi, $query);

					if( mysqli_num_rows($result) > 0 ){

						while( $row = mysqli_fetch_assoc($result) ){

							echo "<tr>";

								echo "<td>".$row['id_pendaftaran']."</td>";
								echo "<td>".$row['tanggal_pendaftaran']."</td>";
								echo "<td>".$row['nama']."</td>";
								echo "<td>".$row['jenis_kelamin']."</td>";
								echo "<td>".$row['tempat_lahir']."</td>";
								echo "<td>".$row['tanggal_lahir']."</td>";
								echo "<td>".$row['nik']."</td>";

							echo "</tr>";

						}

					}

				?>

			</tbody>
		</table>

	</div>

</body>
</html>