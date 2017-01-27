<div id="slideshow_container">  
	<div class="slideshow">
	    <ul class="slideshow">
                <?php 
                $images = new DirectoryIterator("./templates/default/images/slider_images/");
                
                foreach ($images as $image){
                    if(!$image->isDot()){

                        echo "<li class='show'><img width='940' height='250' src='{$image->getPathname()}' alt='&quot;{$image->getFilename()}&quot;' /></li>";
                    }   
                }
                ?>
            </ul> 
	</div><!--close slideshow-->  	
</div><!--close slideshow_container-->  

<!-- javascript at the bottom for fast page loading -->
<script type="text/javascript" src="<?php echo SITE_ROOT; ?>/templates/default/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo SITE_ROOT; ?>/templates/default/js/image_slide.js"></script>