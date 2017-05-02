<!-- Blog Post -->
<div id="content-top-border" class="container">
</div>
<!-- === BEGIN CONTENT === -->
    <div id="content">
        <div class="container background-white">
            <div class="row margin-vert-30">
                <div class="col-md-9">

<?php
//dd($data['userProfile']);
    if(!empty($data['article']) && !empty($data['userProfile'])) {
?>
                   <div class="blog-post">
                    <div class="blog-item-header">
                        <h2>
                            <a href="/blog_single/<?php echo ($data['article']->id) ? $data['article']->id : ''; ?>">
                                <?php echo ($data['article']->title) ? replace($data['article']->title) : ''; ?>
                            </a>
                        </h2>
                    </div>
                    <div class="blog-post-details">
                        <!-- Author Name -->
                        <div class="blog-post-details-item blog-post-details-item-left user-icon">
                            <i class="fa fa-user color-gray-light"></i>
                            <span>By <?php echo ($data['userProfile']->name) ? $data['userProfile']->name : ''; ?> <?php echo ($data['userProfile']->surname) ? $data['userProfile']->surname : ''; ?></span>
                        </div>
                        <!-- End Author Name -->
                        <!-- Date -->
                        <div class="blog-post-details-item blog-post-details-item-left">
                            <i class="fa fa-calendar color-gray-light"></i>
                            <span><?php echo ($data['article']->updated_at) ? date('d\.m\.Y', strtotime($data['article']->updated_at)) : ''; ?></span>
                        </div>
                        <!-- End Date -->
                        <!-- # of Comments -->
<!--                        <div class="blog-post-details-item blog-post-details-item-left blog-post-details-item-last">-->
<!--                            <a href="#comments">-->
<!--                                <i class="fa fa-comments color-gray-light"></i>-->
<!--                                3 Comments-->
<!--                            </a>-->
<!--                        </div>-->
                        <!-- End # of Comments -->
                    </div>
                    <div class="blog-item">
                        <div class="clearfix"></div>
                        <div class="blog-post-body row margin-top-15">
                            <div class="col-md-5">
                                <a href="/blog_single/<?php echo ($data['article']->id) ? $data['article']->id : ''; ?>">
                                    <?php echo ($data['article']->image) ? '<img height="196" width="300" src="resources/images/img_for_articles/' . replace($data['article']->image) . '" class="margin-bottom-20" alt="article" />' : ''; ?>
                                </a>
                            </div>
                            <div class="">
                                <p class="text-justify">
                                    <?php echo ($data['article']->content) ? htmlspecialchars_decode(replace($data['article']->content)) : ''; ?>
                                </p>
                            </div>
                        </div>
                        <div class="blog-item-footer">
                            <!-- About the Author -->
                            <div class="blog-author panel panel-default margin-bottom-30">
                                <div class="panel-heading">
                                    <h3>O autoru</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <?php echo ($data['userProfile']->image) ? '<img src="' . SITE_ROOT . '/resources/images/img_profile/' . replace($data['userProfile']->image) . '" class="pull-left" />' : ''; ?>
                                        </div>
                                        <div class="col-md-10">
                                            <label><?php echo ($data['userProfile']->name) ? $data['userProfile']->name : ''; ?> <?php echo ($data['userProfile']->surname) ? $data['userProfile']->surname : ''; ?></label>
                                            <p class="text-justify">
                                                <?php echo ($data['userProfile']->profess_headline) ? $data['userProfile']->profess_headline : ''; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End About the Author -->
                            [COMMENTS]
                        </div>
                    </div>
                </div>
                <!-- End Blog Post -->
        <?php

         } else {
        ?>

                    <div class="col-md-12">
                        <?php echo !empty($data['messageException']) ? $data['messageException'] : 'Članak nije pronađen'; ?>
                    </div>

        <?php
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