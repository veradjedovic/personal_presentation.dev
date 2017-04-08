                                        <!-- Recent Posts -->
                                        <div class="recent-posts">
                                            <?php
                                                if(isset($data['itemsFirst'])) {
                                            ?>
                                            <h3><?php echo $data['itemsFirst']->channel->title[0] ? $data['itemsFirst']->channel->title[0] : '' ?></h3>
                                            <ul class="posts-list margin-top-10">                                               
                                                <li>
                                                    <?php  
                                                        $i = 0;
                                                        foreach($data['itemsFirst']->channel->item as $item){
                                                            if($i == 5) break;
                                                    ?>
                                                            <div class="recent-post">
                                                                <a href="<?php echo $item->link ? $item->link : '' ?>" target="_blank">
                                                                    <img class="pull-left" height="54" width="60" src="<?php echo $item->image ? $item->image : '' ?>" alt="<?php echo $data['itemsFirst']->channel->title[0] ? $data['itemsFirst']->channel->title[0] : '' ?>" />
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
                                                    } else {

                                                        echo "<li>{$data['message']}</li>";
                                                    ?>            
                                                </li>
                                            </ul>
                                                    <?php
                                                        } 
                                                    ?>
                                        </div>
                                        <!-- End Recent Posts -->
                                        <!-- Recent Posts -->
                                        <div class="recent-posts">
                                            <?php
                                                if(isset($data['itemsSecond'])) {
//                                                    dd($data['itemsSecond']->channel->image->url);
                                            ?>
                                            <h3><?php echo $data['itemsSecond']->channel->title[0] ? $data['itemsSecond']->channel->title[0] : '' ?></h3>
                                            <ul class="posts-list margin-top-10">                                               
                                                <li>
                                                    <?php  
                                                        $i = 0;
                                                        foreach($data['itemsSecond']->channel->item as $itemSec){
                                                            if($i == 5) break;
                                                    ?>
                                                            <div class="recent-post">
                                                                <a href="<?php echo $itemSec->link ? $itemSec->link : '' ?>" target="_blank">
                                                                    <img class="pull-left" height="54" width="60" src="<?php echo $item->image ? $item->image : '' ?>" alt="<?php echo $data['itemsSecond']->channel->title[0] ? $data['itemsSecond']->channel->title[0] : '' ?>" />
                                                                </a>
                                                                <a href="<?php echo $itemSec->link ? $itemSec->link : '' ?>" target="_blank" class="posts-list-title"><?php echo $itemSec->title ? (strlen($itemSec->title)>45 ? substr($itemSec->title, 0, 45) . '...': $itemSec->title) : '' ?></a>
                                                                <br>
                                                                <span class="recent-post-date">
                                                                    <?php echo $itemSec->pubDate ? $itemSec->pubDate : '' ?>
                                                                </span>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                    <?php
                                                        $i++;
                                                        }
                                                    } else {

                                                        echo "<li>{$data['message']}</li>";
                                                    ?>            
                                                </li>
                                            </ul>
                                                    <?php
                                                        } 
                                                    ?>
                                        </div>
                                        <!-- End Recent Posts -->
                                        