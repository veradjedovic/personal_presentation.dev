<h3>Radno iskustvo</h3>
<br />
    <?php 
    
        foreach ($data['experience'] as $item) {
            
            if($item->title)
            echo "<h4>" . replace($item->title) . "</h4>";
            
            echo "<p style='text-align: justify;'>";
            
            if($item->company || $item->city || $item->country_sr)
            echo ($item->company ? replace($item->company) . ", " : '' ) . ($item->city ? replace($item->city) . ", " : '') . ($item->country_sr ? $item->country_sr : '') . "<br />";
            
            if(($item->month_from && $item->year_from) || ($item->month_to && $item->year_to))
            echo ($item->month_from ? $item->month_from : '') . " " . ($item->year_from ? $item->year_from : '') . " - " . (($item->month_to && $item->year_to) ? $item->month_to . ' ' . $item->year_to: 'I currently working here.') . "<br />";  
            
            if($item->description)
            echo replace($item->description);
            
            echo "</p>";
        }
