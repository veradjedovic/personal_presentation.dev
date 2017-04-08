                        <div style = "clear:both;"></div>
                        <?php 
                        
                        if(isset($data['modulesOfPage']) && $data['modulesOfPage'][0]->name !== 'mod_blank') {
                            
                        ?>
                        
                        <div id="content-top-border" class="container">
                        </div>

                        <!-- === BEGIN CONTENT === --> 
                        <div id="content">
                            <div class="container background-white">
                                <div class="row margin-vert-30">
                                    <div class="col-md-9">
                                        <?php

                                            foreach($data['modulesOfPage'] as $item){

                                                if($item->name !== 'mod_blank') { 
                                        ?>
                                                        <div class="col-md-12">
                                                        <?php include APP_PATH . "views/modules/mod_embedded/{$item->name}/index.php"; ?>
                                                        <hr />
                                                        </div>
                                        <?php  
                                                }         
                                            } 
                                        ?>
                                    </div>   
                                    
                                    <div class="col-md-3">
                                        [SIDEBAR]
                                    </div>
                                    <!-- End Side Column -->
                                    
                                </div>
                            </div>
                        </div>
                        <!--  === END CONTENT ===  -->

                        <!--  === BEGIN FOOTER === -->
                        <?php include APP_PATH . "views/modules/mod_external/mod_life_template/mod_footer/index.php"; 
                        
                        }
                        
