
  
<div class="banner-section">
	<div class="banner">
			<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
			<?php 
include "config/koneksi.php";
if ($sql=mysql_query("SELECT * FROM informasi where id_tampil=2 AND id_status=1 AND id_baca=1 ORDER BY id_informasi desc limit 5"))
{
$x=0;
while ($po=mysql_fetch_assoc($sql)) {
    if($x==0) $aktif="active";
    else $aktif='';
    # code...
             ?>
				<li>
				<div class="banner-img">
					<a href="" data-toggle="modal" data-target="#myModal<?php echo $po[id_informasi]; ?>" >
					<img src="backend/gambar/konten/<?php echo $po['file'];?>" style="width:900px; height:300px;" class="img-responsive" alt=""></a>
				</div>
					<div class="banner-info">
					<h3></h3>
				</div>
		
				</li>


				<?php 
            $x++;
            }          }          ?>
			</ul>
			</div>


					<!--banner-->
		<script src="js/responsiveslides.min.js"></script>
		<script>
									// You can also use "$(window).load(function() {"
		$(function () {
									  // Slideshow 4
				$("#slider4").responsiveSlides({
			auto: true,
			pager:true,
			nav:true,
			speed: 500,
			namespace: "callbacks",
			before: function () {
			  $('.events').append("<li>before event fired.</li>");
			},
			after: function () {
			  $('.events').append("<li>after event fired.</li>");
			}
				});
								
		});
			</script>
	<div class="clearfix"> </div>
</div></div>	

<div class="modal fade" id="myModal<?php echo $po[id_informasi]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-info">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal<?php echo $po[id_informasi]; ?>" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
                  
                    <!-- /music-left -->
                      <div class="post-media">
                          <a href=""><img src="backend/gambar/konten/<?php echo $po['file'];?>" class="img-responsive" alt="" /></a>
                          <div class="blog-text">
                            <a href=""><h3 class="h-t" style="font-family:Corbel;color:black;"><?php echo $po['judul'];?></h3></a>
                              <div class="entry-meta">
                              <h6 class="blg"><i class="fa fa-clock-o"></i> <?php echo $po['tanggal'];?> || <?php echo $po['jam'];?></h6>
                              <div class="icons">
                                <a href="#"><i class="fa fa-user"></i> Admin</a>
                              </div>
                                <div class="clearfix"></div>
                              <p><?php echo $po['isi'];?></p>
                            </div>
                          </div>
                      </div>
                      </div>
                    
          </div>
        </div>
      </div>