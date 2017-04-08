                                    <!-- Sample Menu -->
                                    <div class="col-md-3 margin-bottom-20 text-center">
                                        <h3 class="margin-bottom-10">Meni</h3>
                                        <ul class="menu"> 
                                            <?php
                                            
                                            if(isset($data['pages'])) {
                                                
                                                foreach($data['pages'] as $item){

                                                    echo "<li><a class='{$item->icon}' href='" . SITE_ROOT . "/{$item->route}/{$item->id}'>$item->name</a></li>";
                                                }
                                            } else {
                                                
                                                echo "<li>{$data['message']}</li>";
                                            }
                                            ?>
  
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <!-- End Sample Menu -->
                                    