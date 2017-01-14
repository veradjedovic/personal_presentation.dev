<section class = 'section_of_modules'>
<h1>Obrazovanje</h1>
    <?php 
    
        foreach ($data['education'] as $item) {
            
            echo "<hr style='border-top: 1px solid #ccc;' />";
            
            if($item->school)
            echo "<h3>{$item->school}</h3>";
            
            if($item->degree || $item->field_of_study)
            echo "<p>{$item->degree}, {$item->field_of_study}<br />";     
            
            if($item->year_from)
            echo "{$item->year_from}-{$item->year_to}<br />";    
            
            if($item->description)
            echo "{$item->description}</p>";
        }
    ?>
</section>