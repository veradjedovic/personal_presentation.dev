
<h2>Blog</h2>
<br />
                <?php 
                    foreach ($data['articles'] as $item) {
                ?>
                            <!-- Blog Post -->
                            <div class="blog-post padding-bottom-20">
                                
                                <!-- Blog Item Header -->
                                <div class="blog-item-header">
                                    <!-- Title -->
                                    <h3>
                                        <a href="#">
                                            <?php echo ($item->title) ? replace($item->title) : ''; ?>
                                        </a>
                                    </h3>
                                    <div class="clearfix"></div>
                                    <!-- End Title -->
                                </div>
                                <!-- End Blog Item Header -->
                                <!-- Blog Item Details -->
                                <div class="blog-post-details">
                                    <!-- Author Name -->
                                    <div class="blog-post-details-item blog-post-details-item-left">
                                        <i class="fa fa-user color-gray-light"></i>
                                        <span>By <?php echo ($item->author_name) ? $item->author_name : ''; ?> <?php echo ($item->author_surname) ? $item->author_surname : ''; ?></span>
                                    </div>
                                    <!-- End Author Name -->
                                    <!-- Date -->
                                    <div class="blog-post-details-item blog-post-details-item-left">
                                        <i class="fa fa-calendar color-gray-light"></i>
                                        <span><?php echo ($item->updated_at) ? date('d\.m\.Y', strtotime($item->updated_at)) : ''; ?></span>
                                    </div>
                                    <!-- End Date -->
                                    <!-- # of Comments -->
<!--                                    <div class="blog-post-details-item blog-post-details-item-left blog-post-details-item-last">
                                        <a href="">
                                            <i class="fa fa-comments color-gray-light"></i>
                                            7 Comments
                                        </a>
                                    </div>-->
                                    <!-- End # of Comments -->
                                </div>
                                <!-- End Blog Item Details -->
                                <!-- Blog Item Body -->
                                <div class="blog">
                                    <div class="clearfix"></div>
                                    <div class="blog-post-body row margin-top-15">
                                        <div class="col-md-5">
                                            <?php echo ($item->image) ? '<img height="196" width="300" src="resources/images/img_for_articles/' . replace($item->image) . '" class="margin-bottom-20" alt="article" />' : ''; ?>
                                        </div>
                                        <div class="">
                                            <p style="text-align: justify;">
                                                <?php echo ($item->content) ? htmlspecialchars_decode((strlen($item->content)>500) ? (substr(replace($item->content), 0, 500) . '...') : replace($item->content)) : '' ?>
                                                <!-- Read More -->
                                            </p>
                                            <a href="/" class="btn btn-primary">
                                                Pročitaj više...
                                                <i class="icon-chevron-right readmore-icon"></i>
                                            </a>
                                            <!-- End Read More -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Blog Item Body -->
                            </div>
                            <!-- End Blog Item -->
                <?php 
                    }
                ?>  
                            <!-- Pagination -->
                            <ul class="pagination">
                                <li>
                                    <a href="#">&laquo;</a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li class="disabled">
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">&raquo;</a>
                                </li>
                            </ul>
                            <!-- End Pagination -->
