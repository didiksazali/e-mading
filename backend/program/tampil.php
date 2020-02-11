<?php if ($_GET[act]==''){ ?> 
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Data Mode Informasi Website</li>
                   <hr><b style="font-family:Arial;font-size:20px;color:green;">Data Menu Aplikasi di website</b><a class='pull-right btn btn-primary' href='index.php?view=mode&act=tambah'>Tambahkan Data Mode Tampilan</a> <hr>
                  <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
      <thead>
                     <tr>
                                            <th>No</th>
                                            <th>Id Posisi</th>
                                            <th>Nama Posisi</th>
                                            <th>Action</th>
                                        </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM tampil ORDER BY id_tampil DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[id_tampil]</td>
                              <td>$r[nama_tampil]</td>
                              <td>
                                <a class='btn btn-info btn-xs' title='Lihat Detail' href='?view=mode&act=detail$r[id_tampil]'><span class='glyphicon glyphicon-search'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='?view=mode&act=edit&id=$r[id_tampil]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='?view=mode&hapus=$r[id_tampil]'><span class='glyphicon glyphicon-remove'></span></a>
                              </td>";
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM tampil where id_tampil='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=mode';</script>";
                      }

                  ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambah])){
        mysql_query("INSERT INTO tampil VALUES('','$_POST[nama_tampil]')");
        echo "<script>document.location='index.php?view=mode';</script>";
    }
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Tambah Mode Tampilah Informasi</li>

    </div> 
             <br/> <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <tr><th scope='row'>Mode Tampilan</th>               <td><input type='text' class='form-control' name='nama_tampil' autofocus></td></tr>
                  </tbody>
                  </table>
               
              <div class='box-footer'>
                    <button type='submit' name='tambah' class='btn btn-info'> <span class='glyphicon glyphicon-plus'></span> Tambahkan</button>
                    <a href='index.php?view=kategori' class='btn btn-danger pull-right'><span class='glyphicon glyphicon-remove'></span> Cancel</a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='edit'){
   if (isset($_POST[update])){
        mysql_query("UPDATE tampil SET nama_tampil = '$_POST[nama_tampil]'
                                          where id_tampil='$_POST[id_tampil]'");
      echo "<script>document.location='index.php?view=mode&act=edit&id=".$_POST[id_tampil]."';</script>";
    }

    $edit = mysql_query("SELECT * FROM tampil where id_tampil='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Edit Mode Tampilan</li>

    </div> 
             <br/> 
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id_tampil' value='$s[id_tampil]'>
                    
                    <tr><th width='120px' scope='row'>Mode Tampilan</th>      <td><input type='text' class='form-control' name='nama_tampil' value='$s[nama_tampil]'> </td></tr>                 
              </div>
              </tbody>
              </table>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'><span class='fa fa-refresh'></span> Update</button>
                    <a href='index.php?view=mode' class='btn btn-danger pull-right'><span class='fa fa-remove'></span> Cancel</a>
                    
                  </div>

              </form>
              
              </div>
            </div>";
}
?>