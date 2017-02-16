<div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-pencil"></i></div>
                                    <h5>Edit Article</h5>
                                </header>
                                
                                <div id ="message" class="">
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
                                </div>
                                
                                <?php 
                                    if(isset($data['article'])) {
                                ?>
                                
                                <div id="collapse2" class="body collapse in">
                                    
                                    <form class="formUpload form-horizontal" action="admin-articles-picture/<?php echo $data['article']->id ? $data['article']->id : ''; ?>" method="post">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Image of Article</label>
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div id="prewAvatar" class="fileupload-new thumbnail" style="width: 200px; height: 200px;"><img src="<?php echo $data['article']->image ? SITE_ROOT . '/resources/images/img_for_articles/' . $data['article']->image : SITE_ROOT .'/templates/admin/assets/img/demoBig.jpg'; ?>" alt="" /></div>
                                                    <div id="uploadProfImage" class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Upload image</span><span class="fileupload-exists">Change</span><input id="fUpload" name="f_upload" type="file" /></span>
                                                        <a id="removeAvatar" href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-articles-update/<?php echo $data['article']->id ? $data['article']->id : ''; ?>" method="post">                        
                                        <input type="hidden" name="_method" value="patch" />
                                                   
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Title</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_title" id="req" value="<?php echo $data['article']->title ? $data['article']->title : '' ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Pages</label>
                                            <div class="col-lg-4">
                                                <select name="tb_page" id="sport" class="validate[required] form-control">
                                                    <option value="">Chose a page...</option>
                                                <?php foreach($data['pages'] as $page) { ?>
                                                    
                                                    <option <?php echo ($data['article']->page_id == $page->id) ? 'selected' : '' ?> value="<?php echo $page->id ? $page->id : 1; ?>"><?php echo $page->name? $page->name : ''; ?> <?php echo ($page->status == WEB_NOT_VISIBLE) ? '(not visible)' : ''; ?></option>

                                                <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                            
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Visible</label>
                                            <div class="checkbox col-lg-4">
                                                <label>
                                                    <!--<div class="col-lg-4">-->
                                                        <input name="tb_status" type="checkbox" value="<?php echo $data['article']->status ? $data['article']->status : ''; ?>" <?php echo ($data['article']->status == ARTICLE_VISIBLE ) ? 'checked' : '' ?> />Check if you want this article will be visible on the web
                                                    <!--</div>-->
                                                </label>
                                            </div>
                                        </div>                                      
                                        
                                        <div class="col-lg-12">
                                            <div class="box">
                                                <div id="div-3" class="body tab-content">
                                                    <div class="tab-pane fade active in" id="markdown">
                                                        <div class="wmd-panel">
                                                            <div id="wmd-button-bar" class="btn-toolbar"></div>
                                                            <textarea class="form-control" name="ta_content" rows="10" id="wysihtml5"><?php echo $data['article']->content ? $data['article']->content : ''; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="preview">
                                                        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input id="submit" type="submit" name="btn_submit" value="Submit" class="btn btn-primary btn-lg " />
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

<script type="text/javascript">
    
    $('#submit').click(function(e){
       
        e.preventDefault();      
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");
        
        $.ajax({
            
            url: $('.formInsert').attr('action'),      
            type: $('.formInsert').attr('method'),         
            data: $('.formInsert').serialize(),       
            dataType: 'json',
            
            success: function(response) {

                if(response.error == false){
                    
                    $("#message").html(response.message).addClass( "alert alert-success alert-dismissable" );
                } else {
                    $("#message").html(response.message).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response.message);
            }
        });       
    });
    
    $("body").on("change", "#fUpload", function(){

        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");
        
        $.ajax({
            
            url: $('.formUpload').attr('action'),      
            type: $('.formUpload').attr('method'),         
            data: new FormData($('.formUpload')[0]),
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'json',
            
            success: function(response) {

                if(response.error == false){
                    
                    $("#message").html(response.message).addClass( "alert alert-success alert-dismissable" );
                } else {
                    $("#message").html(response.message).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response);
            }
        });       
    });
    
    $("body").on("click", "#removeAvatar", function(){
        
        $("#prewAvatar").html("<img src='<?php echo SITE_ROOT . '/templates/admin/assets/img/demoBig.jpg'; ?>' alt='' />");
    });
    
</script>
