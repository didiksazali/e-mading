<?php 
if($_GET[act]==''){
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>File Program Website</li>
      </ol>
    </div> 
    <br/>
                  <a class='pull-right btn btn-primary btn-sm' href='index.php?view=upload&act=tambah'><span class='fa fa-plus'></span> Tambahkan Data</a>";
                  
                echo "
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
              <input type='hidden' name='kelas' value='$_GET[id]'>
              <input type='hidden' name='pelajaran' value='$_GET[kd]'>
                <table data-toggle='table' data-show-refresh='true' data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' data-pagination='true' data-sort-name='name' data-sort-order='desc'>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama File</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Link</th>
                    <th>Ukuran</th>
                        <th>Action</th></tr>
                        </thead>
                    <tbody>";
                    
                    $no = 1;
                    $tampil = mysql_query("SELECT * FROM file,konten where konten.id_konten=file.id_konten");
                    while($r=mysql_fetch_array($tampil))
                    {
                      $tanggal = tgl_indo($r[tgl]);
                    echo "<tr>
                            <td>$no</td>
                            <td style='color:red'>$r[judul]</td>
                            <td>$tanggal</td>
                            <td>$r[jam]</td>
                            <td>"; ?> <?php echo substr($r['link'],0,30);?> <?php echo"</td>                    
                            <td>$r[ukuran]</td>                    
                            <td><a class='btn btn-info btn-xs' title='Download Bahan dan Tugas' href='$r[link]'><span class='glyphicon glyphicon-download'></span> Download</a>
                                <a class='btn btn-success btn-xs' title='Edit File' href='index.php?view=upload&act=edit&edit=$r[id_file]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete file' href='index.php?view=upload&hapus=$r[id_file]'><span class='glyphicon glyphicon-trash'></span></a>
                                <a class='btn btn-info btn-xs' title='Lihat File' href='index.php?view=upload&act=lihat&id=$r[id_file]'><span class='glyphicon glyphicon-search'></span></a>
                            </td>
                          </tr>";
                        
                      $no++;
                      }

                      if (isset($_GET[hapus])){
                        mysql_query("DELETE FROM file where id_file='$_GET[hapus]'");
                        echo "<script>document.location='index.php?view=upload';</script>";
                      }

                    echo "</tbody>
                  </table>
                </div>
              </div>
              </form>
            </div>";

}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
     mysql_query("INSERT INTO file VALUES ('','$_POST[id_konten]','$_POST[tgl]','$_POST[jam]','$_POST[ukuran]','$_POST[link]')");
            echo "<script>document.location='index.php?view=upload';</script>";
    }
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah File Download</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='150px' scope='row'>Nama File</th> <td><select class='form-control' name='id_konten'> 
                             <option value='0' selected>- Pilih Nama File -</option>"; 
                              $kategori = mysql_query("SELECT * FROM konten ORDER BY judul");
                              $tgl=date('Y-m-d');
                              $jam=date('H:m:s');
                                  while($a = mysql_fetch_array($kategori)){
                                       echo "<option value='$a[id_konten]'>$a[judul]</option>";
                                  }
                             echo "</select>
                    </td></tr>
                    <input type='hidden' class='form-control' value='$tgl' name='tgl' readonly>                   
                    <input type='hidden' class='form-control' value='$jam' name='jam' readonly>                   
                    <tr><th scope='row'>Ukuran</th>      <td><input type='text' class='form-control' name='ukuran'></td></tr>                   
                    <tr><th scope='row'>LINK Download</th>      <td><input type='text' class='form-control' name='link'></td></tr>                   
                  </tbody>
                  </table>
                </div>
                
              </div>
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'> <span class='fa fa-save'></span> SIMPAN</button>
                    <a href='index.php?view=bahantugas' class='btn btn-danger pull-right'><span class='fa fa-remove'></span> CANCEL</a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='edit'){
if (isset($_POST[update])){
      $dir_gambar = 'files/';
      $filename = basename($_FILES['c']['name']);
      $uploadfile = $dir_gambar . $filename;
      if ($filename != ''){      
        if (move_uploaded_file($_FILES['c']['tmp_name'], $uploadfile)) {
          mysql_query("UPDATE file SET id_konten = '$_POST[id_konten]',
                                               file           = '$filename',
                                               tgl    ='$_POST[tgl]' where id_file='$_GET[edit]'");
            echo "<script>document.location='index.php?view=upload';</script>";
        }else{
          echo "<script>window.alert('Gagal Update Data Bahan dan Tugas.');
                      window.location='index.php?view=view=upload&act=edit'</script>";
        }
      }else{
        mysql_query("UPDATE file SET id_konten = '$_POST[id_konten]',
                                             tgl    ='$_POST[tgl]' where id_file='$_GET[edit]'");
        echo "<script>document.location='index.php?view=upload&act=edit';</script>";

      }
  }

$edit = mysql_query("SELECT * FROM file,konten where file.id_konten=konten.id_konten and id_file='$_GET[edit]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Edit Bahan dan Tugas</h3>
                </div>
              <div class='box-body'>
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='120px' scope='row'>Nama File</th> <td><select class='form-control' name='id_konten'> 
                             <option value='0' selected>- Pilih Kategori Tugas -</option>"; 
                              $kategori = mysql_query("SELECT * FROM konten Order by judul");
                              $tgl=date('Y-m-d');
                                  while($a = mysql_fetch_array($kategori)){
                                    if ($s[id_konten]==$a[id_konten]){
                                       echo "<option value='$a[id_konten]' selected>$a[judul]</option>";
                                    }else{
                                       echo "<option value='$a[id_konten]'>$a[judul]</option>";
                                    }
                                  }
                             echo "</select>
                    </td></tr>
                    <tr><th scope='row'>Ganti File</th>             <td><div style='position:relative;''>
                                                                          <a class='btn btn-primary' href='javascript:;'>
                                                                            <b>Ganti File :</b> $s[file]"; ?>
                                                                            <input type='file' class='files' name='file' onchange='$("#upload-file-info").html($(this).val());'>
                                                                          <?php echo "</a> <span style='width:155px' class='label label-info' id='upload-file-info'></span>
                                                                        </div>
                    </td></tr> 
                    <tr><th scope='row'>Tanggal</th>      <td><input type='text' class='form-control' value='$tgl' name='tgl' readonly></td></tr>                   
                  </tbody>
                  </table>
                </div>
                
              </div>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'> <span class='fa fa-refresh'></span> Update</button>
                    <a href='index.php?view=upload' class='btn btn-danger pull-right'><span class='fa fa-remove'></span> CANCEL</a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='lihat'){
    $detail = mysql_query("SELECT * FROM file,konten where file.id_konten=konten.id_konten And id_file='$_GET[id]'");
    $s = mysql_fetch_array($detail);
    $tanggal = tgl_indo($s[tgl]);
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>File Program Website</li>
      </ol>
    </div> 
    <br/>   
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th width='160px' scope='row'>Nama Program</th>      <td>$s[judul]</td></tr>
                    <tr><th scope='row'>ukuran</th>               <td>$s[ukuran]</td></tr>
                    <tr><th scope='row'>Link</th>           <td>$s[link]</td></tr>
                    <tr><th scope='row'>Update Terakhir</th>           <td>$tanggal $s[jam]</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
            </form>
            </div>";
} 
?>