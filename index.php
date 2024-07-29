<!DOCTYPE html>
<html>
<head>
	<title>Sisa.in</title>
	<link rel="icon" href="./aset/sisaa.jpeg">
	<link rel="stylesheet" href="index.css">
</head>

<body>
		<div class="gambar">
			<img src="./aset/sisaaa.png" alt="sisa">

		</div>

		<header class="judul">
			<h1>LOG IN</h1>		
		</header>

		<p class=jargon>“Atur keuanganmu, sisain duitmu”</p>
		<img src="./aset/sisa.png" alt="sisa" class="gambar2">

		<form action="proseslogin.php" method="POST">
			<div class="form">
				<div class="kotak">	
				<p >
					<label for="username"> </label>
					<input type="text" name="username" placeholder="username"/>
				</p>
				<p>
					<label for="pass"> </label>
					<input type="password" name="pass" placeholder="password"/>
				</p>
				<p>
					<input type="submit" value="Login" name="login" />
				</p>
				</div>
				<p>
					Belum punya akun? daftar dulu dong
				</p>
				<a href="formregistrasi.php">Daftar Baru</a>
		</div>
	</form>
	</body>
</html>