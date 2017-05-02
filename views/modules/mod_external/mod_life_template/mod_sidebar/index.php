                                        <!-- Recent Posts -->
                                        <div class="recent-posts">
                                            <?php
                                                if(isset($data['itemsFirst']) && $data['itemsFirst'] != false) {
                                                    
                                                    foreach($data['itemsFirst'] as $items) {
                                            ?>
                                                        <h3><?php echo $items->channel->title ? $items->channel->title : '' ?></h3>
                                                        <ul class="posts-list margin-top-10">
                                                            <li>
                                                                <?php
                                                                    $i = 0;
                                                                    foreach($items->channel->item as $item){
                                                                        if($i == 5) break;
                                                                ?>
                                                                        <div class="recent-post">
                                                                            <a href="<?php echo $item->link ? $item->link : '' ?>" target="_blank">
                                                                                <img class="pull-left" height="54" width="60" src="<?php echo $item->image ? $item->image : ($items->channel->image->url ? $items->channel->image->url : ''); ?>" alt="<?php echo $items->channel->title[0] ? $items->channel->title[0] : '' ?>" />
                                                                            </a>
                                                                            <a href="<?php echo $item->link ? $item->link : '' ?>" target="_blank" class="posts-list-title"><?php echo $item->title ? (strlen($item->title)>45 ? substr($item->title, 0, 45) . '...': $item->title) : '' ?></a>
                                                                            <br>
                                                                            <span class="recent-post-date">
                                                                                <?php echo $item->pubDate ? $item->pubDate : '' ?>
                                                                            </span>
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                <?php
                                                                    $i++;
                                                                    }
                                                                ?>
                                                            </li>
                                                        </ul>
                                            <?php
                                                    }
                                                } else {

                                                        echo "<ul><li>{$data['message']}</li></ul>";
                                                } 
                                            ?>
                                        </div>
                                        <!-- End Recent Posts -->
                                        