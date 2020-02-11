<div class="review-slider" style="width:1500px;">
	<div class="tittle-head">
		<h3 class="tittle" style="font-family:Eurostar Black;"> <span class="new"> Data Gallery Mading</span></h3>
			<div class="clearfix"> </div>
	</div>
		<ul id="flexiselDemo1">
		<?php 
include "config/koneksi.php";
if ($sql=mysql_query("SELECT * FROM informasi where id_tampil=5 AND id_status=1 AND id_baca=1 ORDER BY id_informasi desc limit 5"))
{
$x=0;
while ($a=mysql_fetch_assoc($sql)) {
    if($x==0) $aktif="active";
    else $aktif='';
    # code...
             ?>
			<li>
				<a href="#" data-toggle="modal" data-target="#myModal<?php echo $a[id_informasi]; ?>"><img src="backend/gambar/konten/<?php echo $a['file'];?>" 
				width="257px" height="257px" alt=""/></a>
				<div class="slide-title"><h4><?php echo $a[judul]; ?> </div>
					<div class="date-city">
					<h5><?php echo $a[tanggal]; ?> </h5>
					<div class="buy-tickets">
						<a  href="#" data-toggle="modal" data-target="#myModal<?php echo $a[id_informasi]; ?>" style="font-family:Corbel;">Lihat Detail</a>
					</div>
				</div>
	<div class="modal fade" id="myModal<?php echo $a[id_informasi]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-info">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal<?php echo $a[id_informasi]; ?>" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body" style="font-family:Corbel;">
                  
                    <!-- /music-left -->
                      <div class="post-media">
                          <a href=""><img src="backend/gambar/konten/<?php echo $a['file'];?>" class="img-responsive" alt="" /></a>
                          <div class="blog-text">
                            <a href=""><h3 class="h-t" style="font-family:Corbel;"><?php echo $a['judul'];?></h3></a>
                              <div class="entry-meta">
                              <h6 class="blg"><i class="fa fa-clock-o"></i> <?php echo $a['tanggal'];?> || <?php echo $a['jam'];?></h6>
                              <div class="icons">
                                <a href="#"><i class="fa fa-user"></i> Admin</a>
                              </div>
                                <div class="clearfix"></div>
                              <p><a class="" style="font-family:Corbel;"><?php echo $a['isi'];?></a></p>
                            </div>
                          </div>
                      </div>
                      </div>
                    
          </div>
        </div>
      </div>
			</li>
			<?php 
            $x++;
            }         



             }          ?>

			
      
	</ul>
		<script type="text/javascript">
			$(window).load(function() {
					
				$("#flexiselDemo1").flexisel({
								visibleItems: 5,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,    		
								pauseOnHover: false,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems: 2
									}, 
									landscape: { 
										changePoint:640,
										visibleItems: 3
									},
									tablet: { 
										changePoint:800,
										visibleItems: 4
									}
								}
							});
							});
						</script>
						<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
						</div>