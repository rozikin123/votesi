<html>
<head>
<title> belajar piling / Voting </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
 <div class="row">
        <div class="span10">
        <div class="widget-content"><br><br>

<?php
error_reporting (0);
 include "koneksi.php";

//  hasil poling
  $u=mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");
  echo "<h2 align=center>Terimakasih atas partisipasi Anda<br /><br />
        Hasil saat ini: </p></h2><br />";
echo '<table class="table table table-responsive table-bordered table-striped" >';
  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  $jml_vote=$j['jml_vote'];
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y'");
  while ($s=mysql_fetch_array($sql)){
  	$prosentase = sprintf("%2.1f",(($s['rating']/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;
    echo "<tr><td width=120>$s[nama] ($s[rating]) </td><td> 
          <hr style='width:$gbr_vote;border:10px solid blue' height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table >
        <h2><p>Jumlah Voting: <b>$jml_vote</b></p></h2>";
 echo "<h3><span class=judul_head><a href=poling.php>&#187; kembali</a></span><h3/><br /><br />";
?>
  </div>
	  </div>
	  </div>
	  </div>
</body>
</html>