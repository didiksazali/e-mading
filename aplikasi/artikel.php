      <script type="text/javascript" src="/e_mading/aplikasi/js/jssor.js"></script>
    <script type="text/javascript" src="/e_mading/aplikasi/js/jssor.slider.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $PlayOrientation: 6,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
                $DragOrientation: 2,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
        });
    </script>
	    <div class="banner" >
    
                <!-- Slideshow 4 -->
               <div class="slider">
    <!-- Jssor Slider Begin -->
    <!-- You can move inline styles to css file or css block. -->
    <div id="slider1_container" style="border-radius:15px;position: relative; top: 0px; left: auto; right:0; width: 600px;
        height: 300px;">
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: relative; right:0; left: auto; top: 0px; width: 600px; height: 300px;
            overflow: hidden;">
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
				<div><img style="width:420px;height:300px;" src="backend/gambar/konten/<?php echo $a['file'];?>"  /></div>
               <?php 
            $x++;
            }           }
            ?>  
        </div>
		</div>
    <!-- Jssor Slider End -->