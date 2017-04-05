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
                                        <!-- Blog Tags -->
                                        <div class="blog-tags">
                                            <h3>Tags</h3>
                                            <ul class="blog-tags">
                                                <li>
                                                    <a href="#" class="blog-tag">HTML</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">CSS</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">JavaScript</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">jQuery</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">PHP</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">Ruby</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">CoffeeScript</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">Grunt</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">Bootstrap</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="blog-tag">HTML5</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Blog Tags -->
                                        <!-- Recent Posts -->
                                        <div class="recent-posts">
                                            <h3>Recent Posts</h3>
                                            <ul class="posts-list margin-top-10">
                                                <li>
                                                    <div class="recent-post">
                                                        <a href="">
                                                            <img class="pull-left" src="assets/img/blog/thumbs/thumb1.jpg" alt="thumb1">
                                                        </a>
                                                        <a href="#" class="posts-list-title">Sidebar post example</a>
                                                        <br>
                                                        <span class="recent-post-date">
                                                            July 30, 2013
                                                        </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="recent-post">
                                                        <a href="">
                                                            <img class="pull-left" src="assets/img/blog/thumbs/thumb2.jpg" alt="thumb2">
                                                        </a>
                                                        <a href="#" class="posts-list-title">Sidebar post example</a>
                                                        <br>
                                                        <span class="recent-post-date">
                                                            July 30, 2013
                                                        </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="recent-post">
                                                        <a href="">
                                                            <img class="pull-left" src="assets/img/blog/thumbs/thumb3.jpg" alt="thumb3">
                                                        </a>
                                                        <a href="#" class="posts-list-title">Sidebar post example</a>
                                                        <br>
                                                        <span class="recent-post-date">
                                                            July 30, 2013
                                                        </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                                <li>
                                                    <div class="recent-post">
                                                        <a href="">
                                                            <img class="pull-left" src="assets/img/blog/thumbs/thumb4.jpg" alt="thumb4">
                                                        </a>
                                                        <a href="#" class="posts-list-title">Sidebar post example</a>
                                                        <br>
                                                        <span class="recent-post-date">
                                                            July 30, 2013
                                                        </span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Recent Posts -->
                                    </div>
                                    <!-- End Side Column -->
                                    
                                </div>
                            </div>
                        </div>
                        <!--  === END CONTENT ===  -->

                        <!--  === BEGIN FOOTER === -->
                        <?php include APP_PATH . "views/modules/mod_external/mod_life_template/mod_footer/index.php"; 
                        
                        }
                        
