                                    <!-- Disclaimer -->
                                    <div class="col-md-3 margin-bottom-20 text-center">
                                        <h3 class="margin-bottom-10">Zanimlji linkovi</h3>
                                        <ul class="menu"> 
                                            <?php
                                            
                                            if(isset($data['items'])) {
                                                
                                                foreach($data['items'] as $item){

                                                    echo "<li><a href='/'>$item</a></li>";
                                                }
                                            } else {
                                                
                                                echo "<li>{$data['message']}</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <!-- End Disclaimer -->