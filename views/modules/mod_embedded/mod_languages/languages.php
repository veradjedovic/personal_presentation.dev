<h3 class="margin-bottom-10">Poznavanje jezika</h3>
<br />
    <?php 
        foreach ($data['languages'] as $item) {
                      
            if($item->name){
                echo "<p style='text-align: justify;'>" . replace($item->name) . ($item->prof_name ? " - " . $item->prof_name : '') . "</p>";
            }
        }
