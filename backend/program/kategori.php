<?php if ($_GET[act]==''){ ?> 
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Kategori Program Website</li>
                   <hr><b style="font-family:Arial;font-size:20px;color:green;">Data Menu Aplikasi di website</b><a class='pull-right btn btn-primary' href='index.php?view=kategori&act=tambah'>Tambahkan Data Kategori</a> <hr>
                  <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
      <thead>
                     <tr>
                                            <th>No</th>
                                            <th>ID Kategori</th>
                                            <th>Kategori</th>
                                            <th>Action</th>
                                        </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM kategori ORDER BY id_kategori DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[id_kategori]</td>
                              <td>$r[nama_kategori]</td>
                              <td>
                                <a class='btn btn-info btn-xs' title='Lihat Detail' href='?view=kategori&act=detail$r[id_kategori]'><span class='glyphicon glyphicon-search'></span></a>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='?view=kategori&act=edit&id=$r[id_kategori]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='?view=kategori&hapus=$r[id_kategori]'><span class='glyphicon glyphicon-remove'></span></a>
                              </td>";
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM kategori where id_kategori='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=kategori';</script>";
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
        mysql_query("INSERT INTO kategori VALUES('','$_POST[nama_kategori]')");
        echo "<script>document.location='index.php?view=kategori';</script>";
    }
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Tambah Kategori Program</li>

    </div> 
             <br/> <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-12'>
                  <table class='table table-condensed'>
                  <tbody>
                    <tr><th scope='row'>Nama Kategori</th>               <td><input type='text' class='form-control' name='nama_kategori' autofocus></td></tr>
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
        mysql_query("UPDATE kategori SET nama_kategori = '$_POST[nama_kategori]'
                                          where id_kategori='$_POST[id_kategori]'");
      echo "<script>document.location='index.php?view=kategori&act=edit&id=".$_POST[id_kategori]."';</script>";
    }

    $edit = mysql_query("SELECT * FROM kategori where id_kategori='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Edit Kategori Program</li>

    </div> 
             <br/> 
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                <div class='col-md-6'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id_kategori' value='$s[id_kategori]'>
                    
                    <tr><th width='120px' scope='row'>Nama Kategori</th>      <td><input type='text' class='form-control' name='nama_kategori' value='$s[nama_kategori]'> </td></tr>                 
              </div>
              </tbody>
              </table>
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'><span class='fa fa-refresh'></span> Update</button>
                    <a href='index.php?view=kategori' class='btn btn-danger pull-right'><span class='fa fa-remove'></span> Cancel</a>
                    
                  </div>

              </form>
              
              </div>
            </div>";
}
?>