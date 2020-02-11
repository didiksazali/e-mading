<?php 
  if(isset($_POST[login])){

    if ($_POST[level]=='admin'){
      $pass=md5($_POST[b]);
      $login=mysql_query("SELECT * FROM user WHERE username='".mysql_real_escape_string($_POST[a])."' AND password='$pass' AND level='admin'");
      $cocok=mysql_num_rows($login);
      $r=mysql_fetch_array($login);

        if ($cocok > 0){
          session_start();
          $_SESSION[id]     = $r[id_user];
          $_SESSION[namalengkap]  = $r[nama_lengkap];
          $_SESSION[level]    = $r[level];
          
          echo "<script>window.alert('Sukses Login Sebagai Administrator.');
                window.location='index.php'</script>";
        }else{
          echo "<script>window.alert('Username atau Password anda salah.');
                window.location='index.php?act=gagal'</script>";
        }
    }elseif ($_POST[level]=='superadmin'){
      $pass=md5($_POST[b]);
      $login=mysql_query("SELECT * FROM user WHERE username='".mysql_real_escape_string($_POST[a])."' AND password='$pass' AND level='superadmin'");
      $cocok=mysql_num_rows($login);
      $r=mysql_fetch_array($login);

        if ($cocok > 0){
          session_start();
          $_SESSION[id]     = $r[id_user];
          $_SESSION[namalengkap]  = $r[nama_lengkap];
          $_SESSION[level]    = $r[level];
          
          echo "<script>window.alert('Sukses Login Sebagai Super Admin.');
                window.location='index.php'</script>";
        }else{
          echo "<script>window.alert('Username atau Password anda salah.');
                window.location='index.php?act=gagal'</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Page Login Member</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
                            <li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <br/><div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form role="form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="useraname" autofocus="" name="a" placeholder="Username" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="exampleInputPassword1" name="b" placeholder="password" />
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="col-sm-10">
                                        <select name='level' class="form-control" required>
                                            <option value='0' selected>- Pilih Level -</option>
                                            <option value='admin'>admin</option>
                                            <option value='superadmin'>Superadmin</option>
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="row">

                                    <div class="col-sm-10">
                                        <button type="submit" name="login" class="btn btn-primary btn-sm">
                                            Login</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="Registration">
                                <form role="form" method="POST" class="form-horizontal" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" required="Data tidak boleh kosong" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="mobile" placeholder="Nama Lengkap" name="nama_lengkap" required="Data tidak boleh kosong" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" id="email" placeholder="email" name="email"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" id="email" placeholder="No. Handphone" name="phone"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                        <input type="hidden" class="form-control" placeholder="" name="level" value="reguler" />
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="" placeholder="Alamat Lengkap Anda" name="alamat" /></textarea>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" name="send" class="btn btn-primary btn-sm">
                                            Save Data </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
			</div>
		</div>
	</div>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
<?php
if (isset($_POST[send])){
      $simpan=mysql_query("INSERT INTO member VALUES('','$_POST[username]','$_POST[nama_lengkap]','$_POST[email]','$_POST[phone]','$_POST[level]','$_POST[alamat]')");
      if($simpan) {
      echo "
      <script>window.alert('Terimkasih.. Anda Berhasil Mendaftar sebagai Member hakimalfatih.com..');
                window.location='index.php'</script>";
    }else {
         echo "<script>window.alert('Maaf, Anda gagal Pesan anda gagal terkirim. Harap periksa kembali pengisian data anda');
                window.location='./index.php'</script>";
    } 
}
    ?>