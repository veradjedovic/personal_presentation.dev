<div class="row">
                        <div class="col-lg-12">
                            <div class="box">

                                <header class="dark">
                                    <div class="icons"><i class="icon-envelope"></i></div>
                                    <h5> Message </h5>
                                </header>
                                
                                <div id ="message" class="">                  
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
                                </div>
                                
                                <?php 
                                    if(isset($data['messageOne'])) {
                                ?>
                                <div id="collapse2" class="body collapse in"> 
                                    
                                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-messages-send/" method="post"> 
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"></label>
                                            <div class="col-lg-4">
                                                <div class="panel panel-default">                                                   
                                                    <div class="panel-heading">
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-lg-4">From:</label>
                                                            <div class="col-lg-4">
                                                                <input class="validate[required] form-control" id="req" name="tb_email"   placeholder="Enter email" value="<?php echo ($data['messageOne']->email_from) ? $data['messageOne']->email_from : ''; ?>" />
                                                            </div>
                                                        </div>                                              
                                                        <div class="form-group">                                           
                                                            <label class="control-label col-lg-4">Subject:</label>
                                                            <div class="col-lg-4">
                                                                <input class="form-control" name="tb_subject" placeholder="Enter text" value="<?php echo ($data['messageOne']->subject) ? $data['messageOne']->subject : ''; ?>" />
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="panel-body"> 
                                                        <br />
                                                        <p><?php echo ($data['messageOne']->content) ? $data['messageOne']->content : ''; ?></p>
                                                        <br />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4"></label>
                                            <div class="col-lg-4">
                                                <textarea class="form-control" name="ta_content" rows="7"></textarea>
                                            </div>
                                        </div>   
                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input id="submit" type="submit" name="btn_submit" class="btn btn-primary" value="Replay" />
                                        </div>
                                    </form>
                                </div>
                                
                                <?php
                                    }
                                    echo isset($data['messageException']) ? $data['messageException'] : ''; 
                                ?>
                                
                            </div>
                        </div>
</div>    


<!-- GLOBAL SCRIPTS -->
    <?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_scripts/index.php"; ?>
<!-- END GLOBAL SCRIPTS -->
