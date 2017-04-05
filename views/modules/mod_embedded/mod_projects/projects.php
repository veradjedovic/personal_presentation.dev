<h3>Projekti</h3>
<br />
    <?php 
    
        foreach ($data['projects'] as $item) {
            
            if($item->name){
                echo "<h4>" . replace($item->name) . "</h4>";
            }
                
            echo "<p>";
            
            if($item->author){
                echo "Clanovi tima: " . replace($item->author) . "<br />";
            }
            
            if($item->project_url){
                echo "Url projekta: <a href='" . $item->project_url . "' target='_blank'>" . $item->project_url . "</a><br />";
            }
            
            if($item->project_month || $item->project_year){
                echo ($item->project_month ? $item->project_month : '') . " " . ($item->project_year ? $item->project_year : '') . "<br />";  
            }
            
            if($item->description){
                echo replace($item->description);
            }
            
            echo "</p>";
        }


