<h3>Obrazovanje</h3>
<br />
    <?php 
    
        foreach ($data['education'] as $item) {
            
            if($item->school)
            echo "<h4>" . replace($item->school) . "</h4>";
            
            echo "<p>";
            
            if($item->degree || $item->field_of_study)
            echo replace($item->degree) . ", " . replace($item->field_of_study) . "<br />";     
            
            if($item->year_from)
            echo "{$item->year_from}-{$item->year_to}<br />";    
            
            if($item->description)
            echo replace($item->description);
            
            echo "</p>";
        }
