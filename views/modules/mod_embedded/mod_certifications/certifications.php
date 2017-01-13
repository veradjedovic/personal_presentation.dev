    <h1>Sertifikati</h1>
    <?php 
    
        foreach ($data['certifications'] as $item) {
            
            echo "<hr style='border-top: 1px solid #ccc;' />";
            
            if($item->name)
            echo "<h3>{$item->name}</h3>";
            
            if($item->authority)
            echo "<p>{$item->authority}, ";
            
            if($item->licence_number)
            echo "License {$item->licence_number}<br />";
            
            if($item->certif_url)
            echo "{$item->certif_url}<br />";
            
            if($item->certif_day || $item->certif_year)
            echo "Starting {$item->certif_day} {$item->certif_year}</p>";                     
        }


