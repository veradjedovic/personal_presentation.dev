<h3>Sertifikati</h3>
<br />
    <?php 
    
        foreach ($data['certifications'] as $item) {
            
            if($item->name)
            echo "<h4>" . replace($item->name) . "</h4>";
            
            echo "<p>";
            
            if($item->authority)
            echo replace($item->authority) . ", ";
            
            if($item->licence_number)
            echo "License" . replace($item->licence_number) . "<br />";
            
            if($item->certif_url)
            echo "{$item->certif_url}<br />";
            
            if($item->certif_month || $item->certif_year)
            echo "Starting {$item->certif_month} {$item->certif_year}";    
            
            echo "</p>";
        }
        

