<?php 

if(isset($data['messages'])) {
    
    print_r($data['messages']);

}                                    
echo isset($data['messageException']) ? $data['messageException'] : '';  
?> 
<!-- GLOBAL SCRIPTS -->
    <?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_scripts/index.php"; ?>
<!-- END GLOBAL SCRIPTS -->
