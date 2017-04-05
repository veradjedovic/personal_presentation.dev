<div id="content-bottom-border" class="container">
</div>
                               
                        <div id="base">
                            <div class="container padding-vert-30 margin-top-60">
                                <div class="row">
                                     <!-- Contact Details --> 
                                    <div class="col-md-4 margin-bottom-20">
                                        <h3 class="margin-bottom-10">Kontakt</h3>
                                        <p>
                                            <span class="fa-envelope">Email:</span>
                                            <a href="<?php echo SITE_ROOT . "/kontakt/4"; ?>">Pošaljite poruku</a>
                                            <br>
                                            <span class="fa-link">Website:</span>
                                            <a href="<?php echo SITE_ROOT; ?>/">www.p.com</a>
                                        </p>
                                        <p>Srbija, Beograd</p>
                                    </div>
                                     <!-- End Contact Details -->
                                     <!-- Sample Menu -->
                                    <div class="col-md-3 margin-bottom-20 text-center">
                                        <h3 class="margin-bottom-10">Meni</h3>
                                        <ul class="menu"> 
                                            <?php

                                                foreach($data['pages'] as $item){

                                                    echo "<li><a class='{$item->icon}' href='" . SITE_ROOT . "/{$item->route}/{$item->id}'>$item->name</a></li>";
                                            }
                                            ?>
  
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                     <!-- End Sample Menu -->
                                    <div class="col-md-1"></div>
                                     <!-- Disclaimer -->
                                    <div class="col-md-3 margin-bottom-20 text-center">
                                        <h3 class="margin-bottom-10">Zanimljivosti</h3>
                                        <ul class="menu"> 
                                            <?php

                                                foreach($data['pages'] as $item){

                                                    echo "<li><a class='{$item->icon}' href='" . SITE_ROOT . "/{$item->route}/{$item->id}'>$item->name</a></li>";
                                            }
                                            ?>
  
                                        </ul>
                                    </div>
                                     <!-- End Disclaimer -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>