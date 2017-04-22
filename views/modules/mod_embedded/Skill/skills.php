<h3 class="margin-bottom-10">Znanja i vestine</h3>
<br />
    <?php 
        foreach ($data['skills'] as $item) {
    ?>
            <h4 class='progress-label'><?php echo $item->name ? $item->name : ''; ?>
                <span class='pull-right'><?php echo $item->persentage ? $item->persentage . '%' : '1%'; ?></span>
            </h4>
            <div class='progress progress-sm'>
                <div class='progress-bar progress-bar-primary' role='progressbar' aria-valuenow='<?php echo $item->persentage ? $item->persentage . '%' : '1%'; ?>' aria-valuemin='0' aria-valuemax='100' style='width: <?php echo $item->persentage ? $item->persentage . '%' : '1%'; ?>'>
                </div>
            </div>                      
<!--            if($item->name){
                echo "<span class='button_small' style='color:#cfcfcf; margin:5px 10px 5px 0;'>" . ($item->persentage ? $item->persentage . '%' : '1%') . " " . replace($item->name) . "</span>";-->
    <?php            
        }
    ?>


                                    
<div style = "clear: both;"></div>