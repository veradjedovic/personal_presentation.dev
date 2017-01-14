<section class = 'section_of_modules'>
<h1>Znanja i vestine</h1>
 <hr style='border-top: 1px solid #ccc;' />
 <br />
 <p>
    <?php 
        foreach ($data['skills'] as $item) {
                      
            if($item->name){
                echo "<span class='button_small' style='color:#ffffff; margin:5px 10px 5px 0;'> {$item->name} </span>";
            }
        }
    ?>
 </p>
 <br />
<div style = "clear: both;"></div>
</section>