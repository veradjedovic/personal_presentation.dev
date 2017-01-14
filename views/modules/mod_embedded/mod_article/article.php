<div>
    <?php 
        foreach ($data['articles'] as $item) {
           
            echo "<article class = 'article_class'>";
            
            if($item->image)
            echo "<img src = '{$item->image}' class = 'article_img' />";

            echo "<br />";
            
            if($item->title)
            echo "<h3>{$item->title} - <small>" . date('d\.m\.Y', strtotime($item->updated_at)) . "</small></h3>";
            
            if($item->content)
            echo "<p>" . (strlen($item->content)>500) ? substr($item->content,0,500) . "..." : $item->content . "</p>";
            
            if($item->author_name || $item->author_surname)
            echo "<p>Autor: " . ($item->author_name ? $item->author_name : '') . " " . ($item->author_surname ? $item->author_surname : '') . "</p>";  
            
            echo "<p><small><a class ='button_small' href = '/'>Procitaj vise...</a></small><div style = 'clear:both'></div></p>";
            echo "<div style = 'clear:both'></div>";
            echo "</article>";              
            }
    ?>
</div>
