<?php if ($_GET[act]==''){ ?> 
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Data Informasi Website</li>
      </ol>
    </div>    
      <hr><span class="" style="font-family:Calibri;color:green;font-size:18px;">Data Menu Informasi Video<a class='pull-right btn btn-primary btn-sm' href='index.php?view=video&act=tambahinfo'>Tambahkan Data Informasi</a> <hr>
                  
    <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
      <thead>
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Kategori Informasi</th>
          <th>Judul</th>
          <th>Tampil Sebagai</th>
          <th>Status</th>
          <th>Baca</th>
          <th>Action</th>
        </tr>
     </thead>
    <tbody>
      <?php 
        $tampil = mysql_query("SELECT * FROM informasi,tampil,kategori,status,baca where informasi.id_tampil=tampil.id_tampil AND informasi.id_kategori=kategori.id_kategori AND informasi.id_status=status.id_status AND informasi.id_baca=baca.id_baca AND id_tampil=3 order by id_informasi desc");
        $no = 1;
        while($r=mysql_fetch_array($tampil)){
        $tanggal = tgl_indo($r[tanggal]);
        echo "<tr><td>$no</td>
                <td>$tanggal</td>
                <td>$r[nama_kategori]</td>
                <td>$r[judul]</td>
                <td>";
                if($_SESSION[level]=='admin'){
                  echo"$r[nama_tampil]";
                }else{
                  echo"<form action='' method='POST'>
                  <input type='hidden' name='id_informasi' value='$r[id_informasi]'>
                  <select class='form-control' name='id_tampil'> 
                                                                          <option value='0' selected>- Pilih Status Tayang -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM tampil order by nama_tampil desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_tampil] == $r[id_tampil]){
                                                                                echo "<option value='$a[id_tampil]' selected>$a[nama_tampil]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_tampil]'>$a[nama_tampil]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select>
                    <button type='submit' class='btn btn-info btn-sm' href='#' name='ubah_tampil'><i class='glyphicon glyphicon-refresh'></i></button>
                    </form>"; }
                  echo"</td>
                <td>";
                if($_SESSION[level]=='admin'){
                  echo"$r[nama_status]";
                }else{
                  echo"<form action='' method='POST'>
                  <input type='hidden' name='id_informasi' value='$r[id_informasi]'>
                  <select class='form-control' name='id_status'> 
                                                                          <option value='0' selected>- Pilih Status Tayang -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM status order by nama_status desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_status] == $r[id_status]){
                                                                                echo "<option value='$a[id_status]' selected>$a[nama_status]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_status]'>$a[nama_status]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select>
                    <button type='submit' class='btn btn-info btn-sm' href='#' name='ubah_status'><i class='glyphicon glyphicon-refresh'></i></button>
                    </form>"; }
                  echo"
                  </td>
                <td>";
                if($_SESSION[level]=='admin'){
                  echo"$r[nama_baca]";
                }else{
                  echo"<form action='' method='POST'>
                  <input type='hidden' name='id_informasi' value='$r[id_informasi]'>
                  <select class='form-control' name='id_baca'> 
                                                                          <option value='0' selected>- Pilih Status Baca -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM baca order by nama_baca desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_baca] == $r[id_baca]){
                                                                                echo "<option value='$a[id_baca]' selected>$a[nama_baca]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_baca]'>$a[nama_baca]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select>
                    <button type='submit' class='btn btn-info btn-sm' href='#' name='ubah_baca'><i class='glyphicon glyphicon-refresh'></i></button>
                    </form>"; }
                  echo"</td>
                <td>
                <a class='btn btn-info btn-sm' title='Lihat Detail' href='?view=konten&act=detailinfo&id=$r[id_informasi]'><span class='glyphicon glyphicon-search'></span></a>
                <a class='btn btn-success btn-sm' title='Edit Data' href='?view=konten&act=editinfo&id=$r[id_informasi]'><span class='glyphicon glyphicon-edit'></span></a>
                <a class='btn btn-danger btn-sm' title='Delete Data' href='?view=konten&hapus=$r[id_informasi]'><span class='glyphicon glyphicon-remove'></span></a>
               </td>";
        echo "</tr>";
         $no++;
            }
        if (isset($_GET[hapus])){
          mysql_query("DELETE FROM informasi where id_informasi='$_GET[hapus]'");
        echo "<script>document.location='index.php?view=konten';</script>";
          }
          ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='tambahinfo'){
  if (isset($_POST[tambah])){
      $dir_gambar = 'gambar/konten/';
      $filename = basename($_FILES['file']['name']);
      $type = basename($_FILES['file']['type']);
      $filename = basename($_FILES['file']['size']);
      $uploadfile = $dir_gambar . $filename;
      if ($filename != ''){      
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
          $simpan=mysql_query("INSERT INTO Informasi VALUES ('','$_POST[id_kategori]','$_POST[tanggal]','$_POST[jam]','$_POST[judul]','$filename','$_POST[isi]','$_POST[id_tampil]','$_POST[id_status]','$_POST[id_baca]')");
            if ($simpan){
              echo "<script>document.location='index.php?view=konten';</script>";
            }
        }else{
          echo "<script>window.alert('Gagal Tambahkan Data.');
                      window.location='index.php?view=konten'</script>";
        }
      }else{
        mysql_query("INSERT INTO informasi VALUES ('','$_POST[id_kategori]','$_POST[tanggal]','$_POST[jam]','$_POST[judul]','$_POST[isi]','$_POST[id_tampil]','$_POST[id_status]','$_POST[id_baca]')");
        echo "<script>document.location='index.php?view=konten';</script>";

      }
  }
$tgl=date('Y-m-d');
$jam=date('H:i:s');
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Tambah Menu Informasi Website</li>
      </ol>
    </div> 
    <br/>
          <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    
                    <tr><th scope='row'>Kategori Informasi</th>               <td><select class='form-control' name='id_kategori'>
                                          <option value=''>----Pilih Kategori----- </option>";
                                      $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
                                      while($data=mysql_fetch_array($tampil))
                                      {
                                      
                                          echo "<option value='$data[id_kategori]'> $data[nama_kategori]</option>";
                                        }
                    echo "<input type='hidden' class='form-control' name='tanggal' value='$tgl' readonly><input type='hidden' class='form-control' name='jam' value='$jam' readonly>
                    <tr><th scope='row'>Judul Program</th>               <td><input type='text' class='form-control' name='judul'></td></tr>
                    <tr><th scope='row'>Upload File</th>             <td><div style='position:relative;''>
                                                                          <a class='btn btn-primary' href='javascript:;'>
                                                                            Cari File Anda..."; ?>
                                                                            <input type='file' class='files' name='file' onchange='$("#upload-file-info").html($(this).val());'>
                                                                          <?php echo "</a> <span style='width:170px' class='label label-info' id='upload-file-info'></span>
                                                                        </div>
                    </td></tr>
                    <tr><th scope='row'>Isi</th>                 <td><textarea type='text' class='ckeditor' name='isi'></textarea></td></tr>
                    <input type='hidden' class='form-control' name='id_tampil' value='3'>
                    <input type='hidden' class='form-control' name='id_status' value='2'>
                    <input type='hidden' class='form-control' name='id_baca' value='2'>
                  </tbody>
                  </table>
            
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'> <span class='glyphicon glyphicon-plus'></span> Tambahkan</button>
                    <a href='index.php?view=konten' class='btn btn-danger pull-right'><span class='glyphicon glyphicon-remove'></span> Cancel</a>
                    
                  </div>
              </form><p><br/></p>
            </div>";
}elseif($_GET[act]=='editinfo'){
  if (isset($_POST[updates])){
      $dir_gambar = 'gambar/konten/';
      $filename = basename($_FILES['file']['name']);
      $uploadfile = $dir_gambar . $filename;
      if ($filename != ''){      
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
          mysql_query("UPDATE informasi SET 
                           id_kategori  = '$_POST[id_kategori]',
                           tanggal      = '$_POST[tanggal]',
                           jam          = '$_POST[jam]',
                           judul        = '$_POST[judul]',
                           file         = '$filename',
                           isi          = '$_POST[isi]',
                           id_tampil    = '$_POST[id_tampil]',
                           id_status    = '$_POST[id_status]',
                           id_baca      = '$_POST[id_baca]'
                           where id_informasi='$_POST[id_informasi]'");

            echo "<script>document.location='index.php?view=konten&act=editinfo&id=".$_POST[id_informasi]."';</script>";
        }else{
          echo "<script>window.alert('Gagal Upload file');
                      window.location='index.php?view=konten&act=editinfo&id=".$_POST[id_informasi]."'</script>";
        }
      }else{
        mysql_query("UPDATE informasi SET 
                           id_kategori  = '$_POST[id_kategori]',
                           tanggal      = '$_POST[tanggal]',
                           jam          = '$_POST[jam]',
                           judul        = '$_POST[judul]',
                           isi          = '$_POST[isi]',
                           id_tampil    = '$_POST[id_tampil]',
                           id_status    = '$_POST[id_status]',
                           id_baca      = '$_POST[id_baca]'
                           where id_informasi='$_POST[id_informasi]'");
        echo "<script>document.location='index.php?view=konten&act=editinfo&id=".$_POST[id_informasi]."';</script>";

      }
  }

    $edit = mysql_query("SELECT * FROM informasi where id_informasi='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    $tgl=date('Y-m-d');
    $jam=date('H:i:s');
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Edit Data Informasi Website</li>
      </ol>
    </div> 
    <br/>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th style='background-color:#E7EAEC' width='190px' rowspan='9'>";
                        if (trim($s[file])==''){
                          echo "<img class='img-thumbnail' style='width:155px' src='gambar/no-image.jpg'>";
                        }else{
                          echo "<img class='img-thumbnail' style='width:190px' src='gambar/konten/$s[file]'>";
                        }
                        echo "</th>
                    </tr>
                    <br/>
                    <input type='hidden' name='id_informasi' value='$s[id_informasi]'>
                     <tr><th scope='row'>Kategori Program</th>            <td><select class='form-control' name='id_kategori'> 
                                                                          <option value='0' selected>- Pilih Kategori Program -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM kategori order by id_kategori desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_kategori] == $s[id_kategori]){
                                                                                echo "<option value='$a[id_kategori]' selected>$a[nama_kategori]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_kategori]'>$a[nama_kategori]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select></td></tr>
                    <tr><th scope='row' width='220px'>Judul Mading</th>           <td><input type='text' class='form-control' name='judul' value='$s[judul]'></td></tr>
                    <input type='hidden' class='form-control' name='tanggal' value='$tgl' readonly><input type='hidden' class='form-control' name='jam' value='$jam' readonly>
                    <tr><th scope='row'>Ganti File</th>             <td><div style='position:relative;''>
                                                                          <a class='btn btn-primary' href='javascript:;'>
                                                                            Ganti File Informasi..."; ?>
                                                                            <input type='file' class='files' name='file' onchange='$("#upload-file-info").html($(this).val());'>
                                                                          <?php echo "</a> <span style='width:155px' class='label label-info' id='upload-file-info'></span>
                                                                        </div>
                    </td></tr>
                     <tr><th scope='row'>Isi</th>                 <td><textarea type='text' class='ckeditor' name='isi'>$s[isi]</textarea></td></tr>";
                     if($_SESSION[level]=='admin'){
                      echo"<tr><th scope='row'>Mode Tampilan Sebagai</th>            <td><select class='form-control' name='id_tampil'> 
                                                                          <option value='0' selected>- Pilih Mode Tampilan Sebagai -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM tampil order by nama_tampil desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_tampil] == $s[id_tampil]){
                                                                                echo "<option value='$a[id_tampil]' selected>$a[nama_tampil]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_tampil]'>$a[nama_tampil]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select></td></tr>
                     <input type='hidden' class='form-control' name='id_status' value='$s[id_status]'>
                     <input type='hidden' class='form-control' name='id_baca' value='$s[id_baca]'>";
                   }else{
                    echo"<tr><th scope='row'>Mode Tampilan</th>            <td><select class='form-control' name='id_tampil'> 
                                                                          <option value='0' selected>- Pilih Mode Tampilan Sebagai -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM tampil order by nama_tampil desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_tampil] == $s[id_tampil]){
                                                                                echo "<option value='$a[id_tampil]' selected>$a[nama_tampil]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_tampil]'>$a[nama_tampil]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select></td></tr>


                    <tr><th scope='row'>Status Tayang</th>            <td><select class='form-control' name='id_status'> 
                                                                          <option value='0' selected>- Pilih Status Tayang -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM status order by nama_status desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_status] == $s[id_status]){
                                                                                echo "<option value='$a[id_status]' selected>$a[nama_status]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_status]'>$a[nama_status]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select></td></tr>
                          <tr><th scope='row'>Status Baca</th>            <td><select class='form-control' name='id_baca'> 
                                                                          <option value='0' selected>- Pilih Status Baca -</option>"; 
                                                                            $wali = mysql_query("SELECT * FROM baca order by nama_baca desc");
                                                                            while($a = mysql_fetch_array($wali)){
                                                                              if ($a[id_baca] == $s[id_baca]){
                                                                                echo "<option value='$a[id_baca]' selected>$a[nama_baca]</option>";
                                                                              }else{
                                                                                echo "<option value='$a[id_baca]'>$a[nama_baca]</option>";
                                                                              }
                                                                            }
                                                                         echo "</select></td></tr>";  }                 
                  echo"</tbody>
                  </table>
              <div class='box-footer'>
                    <button type='submit' name='updates' class='btn btn-info'>Update</button>
                    <a href='index.php?view=konten'><button class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
              </form>

              <p><br/></p>
            </div>";
}elseif($_GET[act]=='detailinfo'){
    $detail = mysql_query("SELECT * FROM informasi,tampil,kategori,status,baca where informasi.id_tampil=tampil.id_tampil AND informasi.id_kategori=kategori.id_kategori AND informasi.id_status=status.id_status AND informasi.id_baca=baca.id_baca AND id_informasi='$_GET[id]'");
    $s = mysql_fetch_array($detail);
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Detail Informasi Website</li>
      </ol>
    </div> 
    <br/>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th style='background-color:#E7EAEC' width='160px' rowspan='9'>";
                        if (trim($s[file ])==''){
                          echo "<img class='img-thumbnail' style='width:155px' src='foto_siswa/no-image.jpg'>";
                        }else{
                          echo "<img class='img-thumbnail' style='width:155px' src='gambar/konten/$s[file]'>";
                        }
                        echo "<a href='index.php?view=konten&act=editinfo&id=$_GET[id]' class='btn btn-success btn-block'>Edit Profile</a>
                        </th>
                    </tr>
                    <tr><th width='120px' scope='row'>Kategori Informasi</th>      <td>$s[id_kategori]</td></tr>
                    <tr><th scope='row'>Judul Mading</th>               <td>$s[judul]</td></tr>
                    <tr><th scope='row'>Tanggal Posting</th>           <td>$s[tanggal] || $s[jam]</td></tr>
                    <tr><th scope='row'>Isi</th>                 <td>$s[isi]</td></tr>
                    <tr><th scope='row'>Di tampilakn sebagai</th>           <td>$s[tempat]</td></tr>
                    <tr><th scope='row'>Status tampil</th>          <td>$s[nama_status]</td></tr>
                    <tr><th scope='row'>Status baca</th>  <td>$s[nama_baca]</td></tr>
                  </tbody>
                  </table>
                                 
                </div> 
              </div>
            </form>
            </div>";
}  
?>

<?php
if (isset($_POST[ubah_tampil])){
      $simpan=mysql_query("UPDATE informasi SET id_tampil ='$_POST[id_tampil]'
                                             where id_informasi='$_POST[id_informasi]'");
      if($simpan) {
      echo "
      <script>document.location='index.php?view=konten'</script>";
    }else {
         echo "<script>window.alert('Maaf, Informasi gagal di rubah');
                window.location='index.php'</script>";
    } 
}
    ?>

    <?php
if (isset($_POST[ubah_baca])){
      $simpan=mysql_query("UPDATE informasi SET id_baca ='$_POST[id_baca]'
                                             where id_informasi='$_POST[id_informasi]'");
      if($simpan) {
      echo "
      <script>document.location='index.php?view=konten'</script>";
    }else {
         echo "<script>window.alert('Maaf, Informasi gagal di rubah');
                window.location='index.php'</script>";
    } 
}
    ?>

    <?php
if (isset($_POST[ubah_status])){
      $simpan=mysql_query("UPDATE informasi SET id_status ='$_POST[id_status]'
                                             where id_informasi='$_POST[id_informasi]'");
      if($simpan) {
      echo "
      <script>document.location='index.php?view=konten'</script>";
    }else {
         echo "<script>window.alert('Maaf, Informasi gagal di rubah');
                window.location='index.php'</script>";
    } 
}
    ?>