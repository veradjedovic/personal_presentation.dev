 <h1>Poznavanje jezika</h1>
 <hr style='border-top: 1px solid #ccc;' />
    <?php 
        foreach ($data['languages'] as $item) {
                      
            if($item->name){
                echo "<h3>{$item->name}" . ($item->prof_name ? " - " . $item->prof_name : '') . "</h3>";
            }
        }