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
error_reporting (0);
include "../koneksi.php";
$aksi="aksi_poling.php";
switch($_GET['act']){
  // Tampil Modul
  default:
    echo "<h2>Masukan data baru Calon</h2>
          <input type=button value='Tambah Poling' onclick=\"window.location.href='?module=poling&act=tambahpoling';\">
          <input type=button value='Keluar' onclick=\"window.location.href='../index.php';\">"?>
          <table class="table table table-responsive table-bordered table-striped">
          <tr><th>no</th><th>pilihan</th><th>rating</th><th>aktif</th><th>aksi</th></tr>";
    <?php
    $no = 1;
    $tampil=mysql_query("SELECT * FROM poling ORDER BY id_poling DESC");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr>
            <td>$no</td>
            <td>$r[nama]</td>
            <td align=center>$r[rating]</td>
            <td align=center>$r[aktif]</td>
            <td><a href=?module=poling&act=editpoling&id=$r[id_poling]>Edit</a> | 
	              <a href=$aksi?module=poling&act=hapus&id=$r[id_poling]>Hapus</a>
            </td></tr>";
      $no++;
    }
    echo "</table>";
    break;

  case "tambahpoling":
    echo "<h2>Tambah Poling</h2>
          <form method=POST action='$aksi?module=poling&act=input'>
          <table>
          <tr><td>Pilihan</td> <td> : <input type=text name='pilihan'></td></tr>
          <tr><td>Aktif</td>   <td> : <input type=radio name='aktif' value='Y' checked>Y 
                                         <input type=radio name='aktif' value='N'>N  </td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editpoling":
    $edit = mysql_query("SELECT * FROM poling WHERE id_poling='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Poling</h2>
          <form method=POST action=$aksi?module=poling&act=update>
          <input type=hidden name=id value='$r[id_poling]'>
          <table>
          <tr><td>Pilihan</td> <td> : <input type=text name='pilihan' value='$r[pilihan]'></td></tr>";
    if ($r[aktif]=='Y'){
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    echo "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}

?>
</div>
	  </div>
	  </div>
	  </div>
</body>
</html>