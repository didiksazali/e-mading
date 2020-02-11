<?php if ($_GET[act]==''){ ?> 
           <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">     
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Menu Administrator Website</li>
      </ol>
    </div>    
                  <hr>Menu Admin Web<a class='pull-right btn btn-primary btn-sm' href='index.php?view=admin&act=tambah'>Tambahkan Data Admin</a><hr>
               
                 <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
      <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $tampil = mysql_query("SELECT * FROM user ORDER BY id_user DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    echo "<tr><td>$no</td>
                              <td>$r[username]</td>
                              <td>$r[password]</td>
                              <td>$r[email]</td>
                              <td>$r[nama_lengkap]</td>
                              <td>$r[level]</td>
                              <td><center>
                                <a class='btn btn-info btn-xs' title='Edit Data' href='?view=admin&act=edit&id=$r[id_user]'><span class='glyphicon glyphicon-edit'></span> </a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='?view=admin&hapus=$r[id_user]'><span class='glyphicon glyphicon-trash'></span></a>
                              </center></td>";
                            echo "</tr>";
                      $no++;
                      }
                      if (isset($_GET[hapus])){
                          mysql_query("DELETE FROM user where id_user='$_GET[hapus]'");
                          echo "<script>document.location='index.php?view=admin';</script>";
                      }

                  ?>
                  </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
<?php 
}elseif($_GET[act]=='edit'){
    if (isset($_POST[update])){
      $passs = md5($_POST[b]);
      if (trim($_POST[b])==''){
        mysql_query("UPDATE user SET username = '$_POST[username]',
                                        email = '$_POST[email]',
                                         nama_lengkap = '$_POST[nama_lengkap]',
                                         alamat = '$_POST[alamat]',
                                         level = '$_POST[level]'
                               where id_user='$_POST[id_user]'");
      }else{
        mysql_query("UPDATE user SET username = '$_POST[username]',
                                         password = '$passs',
                                         email = '$_POST[email]',
                                         nama_lengkap = '$_POST[nama_lengkap]',
                                         alamat = '$_POST[alamat]',
                                         level = '$_POST[level]' where id_user='$_POST[id_user]'");
      }
      echo "<script>document.location='index.php?view=admin';</script>";
    }
    $edit = mysql_query("SELECT * FROM user where id_user='$_GET[id]'");
    $s = mysql_fetch_array($edit);
    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Edit Data Admin Website</li>
      </ol>
    </div> 
              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <table class='table table-striped table-hover'>
                  <tbody><input type='hidden' class='form-control' name='id_user' value='$s[id_user]'> 
                    <tr><th width='170px' scope='row'> Username </th> <td><input type='text' class='form-control' name='username' value='$s[username]'> </td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='text' class='form-control' name='b'value='$s[password]'></td></tr>
                    <tr><th scope='row'>Email</th>             <td><input type='text' class='form-control' name='email' value='$s[email]'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='nama_lengkap' value='$s[nama_lengkap]'></td></tr>
                    
                    <tr><th scope='row'>Alamat</th>          <td><input type='text' class='form-control' name='alamat' value='$s[alamat]'></td></tr>
                    <tr><th width='120px' scope='row'>Level</th>  <td><select name='level' class='form-control'>
                                                                  <option value='$s[level];'>$s[level]</option>
                                                                  <option value='admin'>admin</option>
                                                                  <option value='superadmin'>superadmin</option>
                                                                  </select></td></tr>
                  </tbody>
                  </table>
              <br/>             
              <div class='box-footer'>
                    <button type='submit' name='update' class='btn btn-info'>UPDATE DATA</button>
                    <a href='index.php?view=user' class='btn btn-danger pull-right'>Cancel</a>
                    
                  </div>
              </form>
            </div>";
}elseif($_GET[act]=='tambah'){
    if (isset($_POST[tambahkan])){
      $passs = md5($_POST[password]);
      $simpan=mysql_query("INSERT INTO user VALUES('','$_POST[username]','$passs','$_POST[email]','$_POST[nama_lengkap]','$_POST[alamat]','$_POST[level]')");
       if($simpan) {
      echo "<script>window.alert('Alhamdulillah.. data telah tersimpan..');
                window.location='index.php?view=admin'</script>";
    }else {
         echo "<script>window.alert('anda');
                window.location='index.php?view=konten'</script>";
    }
    } 

    echo "<div class='col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main'>     
    <div class='row'>
      <ol class='breadcrumb'>
        <li><a href='#'><svg class='glyph stroked home'><use xlink:href='#stroked-home'></use></svg></a></li>
        <li class='active'>Tambah Data Admin Website</li>
      </ol>
    </div> 
    <br/>

              <form method='POST' class='form-horizontal' action='' enctype='multipart/form-data'>
                  <table class='table table-striped table-hover'>
                  <tbody>
                    <tr><th width='170px' scope='row'>Username </th> <td><input type='text' class='form-control' name='username'> </td></tr>
                    <tr><th scope='row'>Password</th>               <td><input type='password' class='form-control' name='password'></td></tr>
                    <tr><th scope='row'>Email</th>                  <td><input type='text' class='form-control' name='email'></td></tr>
                    <tr><th scope='row'>Nama Lengkap</th>           <td><input type='text' class='form-control' name='nama_lengkap'></td></tr>
                    
                    <tr><th scope='row'>Alamat</th>          <td><input type='text' class='form-control' name='alamat'></td></tr>
                    
                    <tr><th width='120px' scope='row'>Level</th>  <td><select name='level' class='form-control'>
                                                                  <option value=''>Pilih Level</option>
                                                                  <option value='admin'>admin</option>
                                                                  <option value='superadmin'>superadmin</option>
                                                                  </select></td></tr>
                  </tbody>
                  </table>
              <br/>             
              <div class='box-footer'>
                    <button type='submit' name='tambahkan' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php?view=admin' class='btn btn-danger pull-right'>Cancel</a>
                    
                  </div>
              </form>
            </div>
            </div>";
          }

?>