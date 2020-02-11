<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TMP00035</title>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lobster+Two' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/carouselScript.js"></script>
<link href="css/carousel.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="header1" align="center">
      <br /><marquee behavior="alternate"><font color="#FFFFFF" size="+3" face="Geneva">Selamat Datang di E-Mading Politeknik Negeri Bengkalis</font></marquee>
</div>
<!---header-wrap-end--->
<div class="banner-wrap">
  <div class="banner">
    <div class="banner-img">
	<div id="carousel">
		<div id="slides">
				<ul>
                <?php
	include 'koneksi.php';
	$query ="select * from tbl_informasi where status_tampil='Tampilkan' order by kategori asc";
	$hasil = mysql_query($query,$koneksi);
	$no=0;
	while ($row=mysql_fetch_array($hasil)){
	?> 
						<li>
                          <div class="portfolio">
    <div class="title" align="center">
      <h1><img src="images/bintang.png" align="absmiddle" /><img src="images/bintang.png" align="absmiddle" /><img src="images/bintang.png" align="absmiddle" /><?php echo $row['kategori'] ?><img src="images/bintang.png" align="absmiddle" /><img src="images/bintang.png" align="absmiddle" /><img src="images/bintang.png" align="absmiddle" /></h1>
    </div>
     <div class="title" align="left">
      <h1><img src="images/bintang.png" align="absmiddle" /><?php echo $row['judul_informasi'] ?><img src="images/bintang.png" align="absmiddle" /></h1>
    </div>
    <div class="panel1 mar-right30">
      <div class="content">
      <img src="images/<?php echo $row['gambar'] ?>" width="80%"  /></div>
    </div>
    <div class="panel" align="justify">
    <div align="center"><h1><img src="images/bintang.png" align="absmiddle" /><img src="images/bintang.png" align="absmiddle"  />Deskripsi<img src="images/bintang.png" align="absmiddle"  /><img src="images/bintang.png" align="absmiddle"  /></h1></div>
      <br /><font color="#000000"><?php echo $row['deskripsi'] ?></font>
    </div>
</div>
          
                        </li>
                        <?php
	};
	?>
				</ul>
				<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<div id="buttons"> <a href="#" id="prev">prev</a> <a href="#" id="next">next</a>
				<div class="clear"></div>
		</div>
</div>
	
	</div>
  
  </div>
  <div class="clearing"></div>
</div>

<div class="copyright-wrap1" align="center">
     <font color="#FFFFFF" size="+1" face="Geneva">Politeknik Negeri Bengkalis Jl. Bathin Alam - Sungai Alam, Bengkalis</font>
  </div>

</body>
</html>
