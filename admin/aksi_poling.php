<html>
<head>
<title> belajar piling / Voting </title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
 <div class="row">
        <div class="span7">
          <div class="widget-content"><br><br>

<?php

include "../koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus poling
if ($module=='poling' AND $act=='hapus'){
  mysql_query("DELETE FROM poling WHERE id_poling='$_GET[id]'");
 
  
echo"<script>alert('Data berhasil Dihapus')</script>";
echo "<meta http-equiv='refresh' content='0; url=/pooling/admin/poling.php'>";
}

// Input poling
elseif ($module=='poling' AND $act=='input'){
  mysql_query("INSERT INTO poling(pilihan,
                                  aktif) 
	                       VALUES('$_POST[pilihan]',
                                '$_POST[aktif]')");
echo"<script>alert('Data berhasil Disimpan')</script>";
echo "<meta http-equiv='refresh' content='0; url=poling.php'>";
}

// Update poling
elseif ($module=='poling' AND $act=='update'){
  mysql_query("UPDATE poling SET pilihan = '$_POST[pilihan]',
                                 aktif   = '$_POST[aktif]'  
                          WHERE id_poling = '$_POST[id]'");
 echo"<script>alert('Data berhasil Diupdat')</script>";
echo "<meta http-equiv='refresh' content='0; url=poling.php'>";
}
?>
  </div>
	  </div>
	  </div>
	  </div>
</body>
</html>