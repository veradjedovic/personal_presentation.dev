<h3>Izdanja</h3>
<br />
    <?php 
    
        foreach ($data['publications'] as $item) {
            
            if($item->title){
                echo "<h4 class='margin-bottom-10'>" . replace($item->title) . "</h4>";
            }
              
            echo "<p style='text-align: justify;'>";
            
            if($item->publisher){
                echo "Izdavač: " . replace($item->publisher) . "<br />";
            }
            
            if($item->author){
                echo "Autori: " . replace($item->author) . "<br />";
            }
            
            if($item->publ_month || $item->publ_year){
                echo ($item->publ_month ? $item->publ_month : '') . " " . ($item->publ_year ? $item->publ_year : '') . "<br />";  
            }
            
            if($item->description){
                echo replace($item->description) . "<br />";
            }
            
            if($item->document_name){
                echo '<a href="' . SITE_ROOT . '/resources/documents/publications_pdf/' . replace($item->document_name) . '" download>Preuzmi pdf</a>';
            }
            
            echo "</p>";
        }
        
