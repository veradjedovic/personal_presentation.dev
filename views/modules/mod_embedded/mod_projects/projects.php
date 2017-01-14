<section class = 'section_of_modules'>
<h1>Projekti</h1>
    <?php 
    
        foreach ($data['projects'] as $item) {
            
            echo "<hr style='border-top: 1px solid #ccc;' />";
            
            if($item->name){
                echo "<h3>{$item->name}</h3>";
            }
                        
            if($item->author){
                echo "<p>Clanovi tima: " . $item->author . "<br />";
            }
            
            if($item->project_month || $item->project_year){
                echo ($item->project_month ? $item->project_month : '') . " " . ($item->project_year ? $item->project_year : '') . "<br />";  
            }
            
            if($item->description){
                echo $item->description . "</p>";
            }
        }
    ?>
</section>

