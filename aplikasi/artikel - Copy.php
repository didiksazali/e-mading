				
    <div class="banner">
    
                <!-- Slideshow 4 -->
               <div class="slider">
                  
            <ul class="rslides" id="slider1">
            <?php 
include "db/koneksi.php";
if ($sql=mysql_query("SELECT * FROM informasi where id_tampil=4 AND id_status=1 AND id_baca=1 ORDER BY id_informasi desc limit 5"))
{
$x=0;
while ($a=mysql_fetch_assoc($sql)) {
    if($x==0) $aktif="active";
    else $aktif='';
    # code...
             ?>      
              <li><img style="height:300px;" src="backend/gambar/konten/<?php echo $a['file'];?>" alt="">
              </li>

               <?php 
            $x++;
            }           }
            ?>  
            </ul>
           
        </div>
        </div>
<p><br/></p>
                        <div class="clearfix"></div>
<!--	<embed src="media/The Chosen One.mp3" width="410" height="75" autostart="true" loop="false">!-->
													
