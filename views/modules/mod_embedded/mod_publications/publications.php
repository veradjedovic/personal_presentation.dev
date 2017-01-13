 <h1>Izdanja</h1>
    <?php 
    
        foreach ($data['publications'] as $item) {
            
            echo "<hr style='border-top: 1px solid #ccc;' />";
            
            if($item->title){
                echo "<h3>{$item->title}</h3>";
            }
              
            if($item->publisher){
                echo "<p>Izdavac: " . $item->publisher . "<br />";
            }
            
            if($item->author){
                echo "Autori: " . $item->author . "<br />";
            }
            
            if($item->publ_month || $item->publ_year){
                echo "<p>" . ($item->publ_month ? $item->publ_month : '') . " " . ($item->publ_year ? $item->publ_year : '') . "<br />";  
            }
            
            if($item->description){
                echo $item->description . "<br />";
            }
            
            if($item->document_name){
                echo "<a href='/'>Preuzmi pdf</a></p>";
            }
        }

