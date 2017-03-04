<section class = 'section_of_modules'>
<h1>Sertifikati</h1>
    <?php 
    
        foreach ($data['certifications'] as $item) {
            
            echo "<hr style='border-top: 1px solid #ccc;' />";
            
            if($item->name)
            echo "<h3>" . replace($item->name) . "</h3>";
            
            if($item->authority)
            echo "<p>" . replace($item->authority) . ", ";
            
            if($item->licence_number)
            echo "License" . replace($item->licence_number) . "<br />";
            
            if($item->certif_url)
            echo "{$item->certif_url}<br />";
            
            if($item->certif_month || $item->certif_year)
            echo "Starting {$item->certif_month} {$item->certif_year}</p>";                     
        }
    ?>
</section>

