<?php 
  session_start();
  error_reporting(0);
  include "config/koneksi.php";
  include "config/library.php";
  include "config/fungsi_indotgl.php";
  if (isset($_SESSION[id])){
        if ($_SESSION[level]=='admin'){
          $iden = mysql_fetch_array(mysql_query("SELECT * FROM rb_users where id_user='$_SESSION[id]'"));
           $nama =  $iden[nama_lengkap];
           $level = 'Admin';
           $foto = 'dist/img/user2-160x160.jpg';
      }elseif($_SESSION[level]=='superadmin'){
          $iden = mysql_fetch_array(mysql_query("SELECT * FROM user where username='$_SESSION[id]'"));
           $nama =  $iden[nama_lengkap];
           $level = 'Superadmin';
           $foto = 'dist/img/user2-160x160.jpg';

      }

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Halaman Administrator </title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
<style type="text/css">
    .files{
      position:absolute;
      z-index:2;
      top:0;
      left:0;
      filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
      opacity:0;
      background-color:transparent;
      color:transparent;
    }
    </style>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#1594b9;">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color:white;"><?php echo $level ?></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $nama; ?></a></li>
							<li><a href="?view=data"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
	<?php 
              if ($_SESSION[level]=='admin'){

                  include "menu/left-sidebar.php";

                  }elseif ($_SESSION[level]=='superadmin'){
                include "menu/sidebar.php";

                  }else{

                include ""; 
              }
            ?>
		 <?php 
          if ($_GET[view]=='home' OR $_GET[view]==''){
          	 if($_SESSION[level]=='superadmin'){

              include "program/informasi.php";

            }else{
                      include "page/home.php";
            }
          }
          ///Data Program///
          elseif ($_GET[view]=='konten'){

                    include "program/informasi.php";

          }elseif ($_GET[view]=='video'){

                    include "program/video.php";

          }elseif ($_GET[view]=='kategori'){

                    include "program/kategori.php";

          }elseif ($_GET[view]=='mode'){

                    include "program/tampil.php";

          }elseif ($_GET[view]=='verifikasi'){

                    include "program/status.php";
          }elseif ($_GET[view]=='admin'){

                    include "user/pengguna_admin.php";
          }

          ///Data Template
          elseif ($_GET[view]=='antri'){

                    include "banner/antrian.php";

          }else{
          include "page/404.php"; 
        }
        ?>
				</div>
								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script src="js/bootstrap-table.js"></script>

	<script>
		$('#calendar').datepicker({
		});

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
	<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
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
  }else{
    include "login.php";
  }
?>