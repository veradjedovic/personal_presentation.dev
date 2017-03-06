<section class = 'section_of_modules'>
<h1>Izdanja</h1>
    <?php 
    
        foreach ($data['publications'] as $item) {
            
            echo "<hr style='border-top: 1px solid #ccc;' />";
            
            if($item->title){
                echo "<h3>" . replace($item->title) . "</h3>";
            }
              
            if($item->publisher){
                echo "<p>Izdavac: " . replace($item->publisher) . "<br />";
            }
            
            if($item->author){
                echo "Autori: " . replace($item->author) . "<br />";
            }
            
            if($item->publ_month || $item->publ_year){
                echo "<p>" . ($item->publ_month ? $item->publ_month : '') . " " . ($item->publ_year ? $item->publ_year : '') . "<br />";  
            }
            
            if($item->description){
                echo replace($item->description) . "<br />";
            }
            
            if($item->document_name){
                echo '<a href="' . SITE_ROOT . '/resources/documents/publications_pdf/' . replace($item->document_name) . '" download>Preuzmi pdf</a></p>';
            }
        }
    ?>
</section>
