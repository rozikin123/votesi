<!DOCTYPE html>
<html>
<head>
	<title>Belajar Membuat Login Multi Level - www.teziger.blogspot.com</title>
</head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<body>
	<form method="post">
	
<?php
//Menghubungkan Ke Database
$host = 'localhost'; //Nama Host
$user = 'root'; //Nama User
$pass = ''; //Nama Password
$database = 'vote'; //Nama Database

$db = mysqli_connect($host,$user,$pass,$database); //Mulai Hubungan

session_start(); //Menyalakan Session
if (!@$_SESSION['masuk']) { //Jika Belum Login Maka Tampilkan Halaman Login

	if (isset($_POST['masuk'])) { // Jika Pengakses Menekan Tombol Masuk
		$user = $_POST['username']; //Mengambil Hasil Input Pada Kolom Input Username
		$pass = $_POST['password']; //Mengambil Hasil Input Pada Kolom Input Password
		$level = $_POST['level']; //Mengambil Jenis Level Yang Dipilih

		if (empty($user) || empty($pass) || empty($level)) {
			echo "<center><div class='peringatan'>Semua Kolom Wajib Diisi!</div></center>";
		}

		if ($level == 'admin') { //Jika Pengakses Memilih Level Admin
			$query = mysqli_query($db, "SELECT*FROM login WHERE level = 'admin' AND username = '$user' AND password = '$pass'"); //Mencari Data Pada Database
			$cek = mysqli_num_rows($query); //Cek Ketersediaan
			if ($cek > 0) { //Jika Tidak Kosong
				$_SESSION['masuk'] = $user; //Membuat Session
				header("location:./"); //Memuat Ulang Halaman
			}
			else{//Jika Kosong
			echo "<center><div class='peringatan'>Username Atau Password Untuk Level Admin Salah!</div></center>";
			}
		}
		elseif ($level == 'user') {
			$query = mysqli_query($db, "SELECT*FROM login WHERE level = 'user' AND username = '$user' AND password = '$pass'"); //Mencari Data Pada Database
			$cek = mysqli_num_rows($query); //Cek Ketersediaan
			if ($cek > 0) { //Jika Tidak Kosong
				$_SESSION['masuk'] = $user; //Membuat Session
				header("location:./"); //Memuat Ulang Halaman
			}
			else{//Jika Kosong
			echo "<center><div class='peringatan'>Username Atau Password Untuk Level User Salah!</div></center>";
			}
		}
	}
?>

<!-- !PAGE CONTENT! -->
<div style="margin-left:40px;margin-right:40px border:5px">

 <!-- /.container-fluid -->
<div style="margin-top:80px" id="showcase">  </div>
  <hr>
   <center>
  <h1><strong>SignIn</strong></h1>
  <hr style="width:300px;border:5px solid red" ">


  <nav class="navbar navbar-default">
   <form>
		<input type="text" class="form-control" name="username" placeholder="Username"><br>
		<input type="password" class="form-control"  name="password" placeholder="Password"><br>
		<select name="level" class="form-control" >
			<option value="">-PILIH LEVEL-</option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
		</select><br>
		<input type="submit" name="masuk" value="Masuk" class="btn btn-success">
	</form> 
  </nav>
  </center>
<?php
}
else{ //Jika Sudah Masuk Maka Tampilkan Halaman Utama
	$data = mysqli_fetch_array(mysqli_query($db, "SELECT*FROM login WHERE username='$_SESSION[masuk]'")); //Mengambil Data Pengguna Yang Login
	if ($data['level'] == 'admin') { //Jika Yang Masuk Adalah Admin
		$konten = '<h1>hello <i>(@'.$data['username'].')</i>!</h1>';
		$masuk ='<a href="admin/poling.php">Masuk</a>';
		
	}
	else{ //Jika Yang Masuk Adalah User
		$konten = '<h1>Hello <i>(@'.$data['username'].')</i>!</h1>';
	$masuk ='<a href="poling.php">Masuk</a>';
	}
	$logout = "<a href='./?keluar=1'>Keluar</a>"; //Membuat Tombol Keluar
	
	if (isset($_GET['keluar'])) { //Jika Klik Tombol Keluar
	unset($_SESSION['masuk']); //Menghapus Session
	header("location:./"); //Memuat Ulang Halaman
	}

	echo $konten.'<br>'.$logout.'||||||||||    '.$masuk;
?>

<?php
}
?>
</body>
</html>