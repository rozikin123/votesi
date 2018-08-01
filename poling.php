<html>
<head>
<title> belajar piling / Voting </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
 <div class="row">

          <div class="widget-content"><br><br>
<?php
include "koneksi.php";
?>
<center><h2><b>PILIH CALON KETUA</b></h2> <br /><br />";
<?php
echo "<form method=POST action='hasil_poling.php'>";
$poling=mysql_query("SELECT * FROM poling WHERE aktif='Y'");
while ($p=mysql_fetch_assoc($poling)){
echo '<table class="table table table-responsive table-bordered table-striped" >';
echo '<tr>';
echo '<td><center><img src="User.png"></center></td>';
echo '</tr>';
echo '<tr>';
echo '<td>Nama : '.$p['nama'].'</center></td>';
echo '</tr>';
echo '<tr>';
echo '<td> Jurusan : '.$p['Jurusan'].'</td>';
echo '</tr>';
echo '<tr>';
echo '<td> Visi& Misi : '.$p['VM'].'</td>';
echo '</tr>';
echo '<tr>';
echo "<td><input type=radio name=pilihan value='$p[id_poling]'/>$p[pilihan]</td>";
echo '</tr></br></table>';
}

echo "<p align=center><input type=submit value=Vote /></p>
      </form>
      <p align=center><a href=hasil_poling.php>Hasil Poling</a></p>
      <hr color=#e0cb91 noshade=noshade /><br />";
	  
	  ?>
</center>	  
	  </div>
	  </div>
	  </div>
	  </div>
</body>
</html>
