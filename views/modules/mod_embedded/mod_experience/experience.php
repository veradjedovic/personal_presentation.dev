<section class = 'section_of_modules'>
<h1>Radno iskustvo</h1>
    <?php 
    
        foreach ($data['experience'] as $item) {
            
            echo "<hr style='border-top: 1px solid #ccc;' />";
            
            if($item->title)
            echo "<h3>{$item->title}</h3>";
            
            if($item->company || $item->city || $item->country)
            echo "<p>" . ($item->company ? $item->company : '' ) . ", " . ($item->city ? $item->city : '') . ", " . ($item->country ? $item->country : '') . "<br />";
            
            if(($item->month_from && $item->year_from) || ($item->month_to && $item->year_to))
            echo ($item->month_from ? $item->month_from : '') . " " . ($item->year_from ? $item->year_from : '') . " - " . ($item->month_to ? $item->month_to : '') . " " . ($item->year_to ? $item->year_to : '') . "<br />";  
            
            if($item->description)
            echo $item->description . "</p>";
        }
    ?>
</section>
