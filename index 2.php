<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Test Print</title>
		<style>
			table,td,th
			{
                border-collapse:collapse;
				padding:5px;
				color: red;
			}
            /* css untuk tabel */
		</style>
	</head>
	<body>
		<table  width="100%" align="center" border="1">
			<tr>
                <!-- ID(PK), Nama, Alamat, Jabatan” dengan value apa saja. -->
			    <th>ID</th>
			    <th>Nama</th>
			    <th>Alamat</th>
			    <th>Jabatan</th>
			</tr>
			<?php
			$conn = mysqli_connect("172.19.0.2","root", "kali", "Trucorp");
            // connect dengan database
			$result = mysqli_query($conn, "SELECT * FROM users");
            // mengambil semua data dari tabel bernama users
			if(!$conn){
                // jika tidak bisa connect dengan server, maka akan print koneksi gagal
				echo "Connection Failed !"; 
				exit;
			}
			else{
				while($row = mysqli_fetch_assoc($result))
				{
				 ?>
				    <tr>
				        <td><p><?php echo $row['ID']; ?></p></td>
				        <td><p><?php echo $row['Nama']; ?></p></td>
				        <td><p><?php echo $row['Alamat']; ?></p></td>
				        <td><p><?php echo $row['Jabatan']; ?></p></td>
				    </tr>
				<?php
				$total++;
				}
			}
			echo "Jumlah client tersambung : ". $total;
			// di php ini, akan ditampilkan jumlah client yang tersambung di server
			mysqli_free_result($result);
			mysqli_close($conn);
			?>
		</table>
	</body>
</html>