
                            <h2>O meni</h2>
                            <br />
                            
                            <?php
                            if($data['userProfile']) {
                            ?>
                            
                            <div class="row">
                                <div class="col-md-6 animate fadeIn">
                                    <?php echo ($data['userProfile']) ? '<img height="279" width="330" src="' . SITE_ROOT . '/resources/images/img_profile/' . replace($data['userProfile']->image) . '" class="margin-top-10" />' : ''; ?>
                                    <ul class="list-inline about-me-icons margin-vert-20">
                                        <li>
                                            <a href="https://www.linkedin.com/in/vladimirdjedovic/" target="_blank">
                                                <i class="fa-lg fa-border fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/vladimir.djedovic" target="_blank">
                                                <i class="fa-lg fa-border fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/djedovicvladimir/" target="_blank">
                                                <i class="fa-lg fa-border fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://plus.google.com/u/0/105393037868890062358" target="_blank">
                                                <i class="fa-lg fa-border fa-google-plus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 margin-bottom-10 animate fadeInRight">
                                    <h3 class="padding-top-10 pull-left">
                                        <?php echo ($data['userProfile']->name) ? $data['userProfile']->name : ''; ?> <?php echo ($data['userProfile']->surname) ? $data['userProfile']->surname : ''; ?>
                                    </h3>
                                    <div class="clearfix"></div><br />
                                    <p><?php echo ($data['userProfile']->city) ? 'Grad - ' . $data['userProfile']->city : ''; ?></p>
                                    <p><?php echo ($data['userProfile']->country_sr) ? 'Država - ' . $data['userProfile']->country_sr : ''; ?><?php echo ($data['userProfile']->country_code) ? '(' . $data['userProfile']->country_code . ')' : ''; ?></p>
                                    <p><?php echo ($data['userProfile']->industry) ? 'Oblast rada - ' . $data['userProfile']->industry : ''; ?></p>
                                    <h4>
                                        <em style='text-align: justify;'><?php echo ($data['userProfile']->profess_headline) ? $data['userProfile']->profess_headline : ''; ?></em>
                                    </h4>
                                </div>
                            </div>
                            
                            <?php
                            }
                            ?>

