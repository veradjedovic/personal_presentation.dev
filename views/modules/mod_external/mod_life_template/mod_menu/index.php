            <div id="hornav" class="container no-padding">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">
                                <?php

                                    foreach($data['pages'] as $item){

                                        echo "<li><a class='{$item->icon}' href='" . SITE_ROOT . "/{$item->route}/{$item->id}'>$item->name</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


<?php

