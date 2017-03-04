<div>
    <?php 
        foreach ($data['articles'] as $item) {
           
            echo "<article class = 'article_class'>";
            
            if($item->image)
            echo '<img src = "resources/images/img_for_articles/' . str_replace('#', "'",$item->image) . '" class = "article_img" />';
            
            if($item->title)
            echo "<h3>" . str_replace('#', "'",$item->title) . "- <small>" . date('d\. m\. Y', strtotime($item->updated_at)) . "</small></h3>";
            
            if($item->content)
            echo "<p>" . htmlspecialchars_decode((strlen($item->content)>500) ? (substr(str_replace('#', "'", $item->content), 0, 500) . '...') : str_replace ('#', "'",$item->content)) . "</p>";
                         
            echo "<br /><br /><p><small><a class ='button_small' href = '/'>Procitaj vise...</a></small><div style = 'clear:both'></div></p>";
            echo "<div style = 'clear:both'></div>";
            echo "</article>";              
            }
    ?>
</div>
