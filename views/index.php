<div style = "clear:both;"></div>

    <?php 
        foreach($data['modulesOfPage'] as $item){
            
            echo "<section style = 'border:7px outset #ccc; padding:15px; margin-bottom:10px;'>";
            include APP_PATH . "views/modules/mod_embedded/{$item->name}/index.php"; 
            echo "</section>";
        }

    ?>

<!--<div class="content_container">
		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus tincidunt.</p>
		  	<div class="button_small">
		      <a href="#">Read more</a>
		    </div>
</div>
<div class="content_container">
		    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus tempor enim. Aliquam facilisis neque non nunc posuere eget volutpat metus tincidunt.</p>          
		  	<div class="button_small">
		      <a href="#">Read more</a>
		    </div>	  
</div>-->