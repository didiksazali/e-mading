
<div class="albums">
	<div class="tittle-head">
		<h3 class="tittle">Gallery E-mading  <span class="new">New</span></h3>
		<a href="index.html"><h4 class="tittle">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
	<?php 
                        $w=mysql_query("SELECT * FROM informasi where id_tampil=5 AND id_status=1 AND id_baca=1 ORDER BY id_informasi desc");
                        while($d=mysql_fetch_array($w)){
                          ?>

	<div class="col-md-3 content-grid">
	<a class="play-icon popup-with-zoom-anim" href=""><img src="backend/gambar/konten/<?php echo $d['file'];?>" title="allbum-name"></a>
	<a class="button play-icon popup-with-zoom-anim" href="" data-toggle="modal" data-target="#myModal<?php echo $d[id_informasi]; ?>">Lihat Detail</a>
</div>
<div class="modal fade" id="myModal<?php echo $d[id_informasi]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content modal-info">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal<?php echo $d[id_informasi]; ?>" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
                  
                    <!-- /music-left -->
                      <div class="post-media">
                          <a href=""><img src="backend/gambar/konten/<?php echo $d['file'];?>" class="img-responsive" alt="" /></a>
                          <div class="blog-text">
                            <a href=""><h3 class="h-t"><?php echo $d['judul'];?></h3></a>
                              <div class="entry-meta">
                              <h6 class="blg"><i class="fa fa-clock-o"></i> <?php echo $d['tanggal'];?> || <?php echo $d['jam'];?></h6>
                              <div class="icons">
                                <a href="#"><i class="fa fa-user"></i> Admin</a>
                              </div>
                                <div class="clearfix"></div>
                              <p><?php echo $d['isi'];?></p>
                            </div>
                          </div>
                      </div>
                      </div>
                    
          </div>
        </div>
      </div>
      </div>


<?php } ?>

				<div class="clearfix"> </div>
			</div>