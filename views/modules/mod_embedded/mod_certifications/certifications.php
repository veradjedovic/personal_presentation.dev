<h3>Sertifikati</h3>
<br />
    <?php 
    
        foreach ($data['certifications'] as $item) {
            
            if($item->name)
            echo "<h4>" . replace($item->name) . "</h4>";
            
            echo "<p style='text-align: justify;'>";
            
            if($item->authority)
            echo replace($item->authority) . ", ";
            
            if($item->licence_number)
            echo "Broj licence: " . replace($item->licence_number) . "<br />";
            
            if($item->certif_url)
            echo "Url sertifikata: <a href='" . $item->certif_url . "' target='_blank'>{$item->certif_url}</a><br />";
            
            if($item->certif_month || $item->certif_year)
            echo "Početak: {$item->certif_month} {$item->certif_year}";    
            
            echo "</p>";
        }
        

