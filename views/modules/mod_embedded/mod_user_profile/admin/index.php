<div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-user"></i></div>
                                    <h5>Edit Profile</h5>
                                </header>
                                
                                <div id ="message" class="">
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
                                </div>
                                
                                <?php 
                                    if(isset($data['userProfile'])) {
                                ?>
                                
                                <div id="collapse2" class="body collapse in">
                                    
                                    <form class="formUpload form-horizontal" action="admin-profile-picture/<?php echo $data['userProfile']->id ? $data['userProfile']->id : ''; ?>" method="post">
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Pre Defined Image</label>
                                            <div class="col-lg-8">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div id="prewAvatar" class="fileupload-new thumbnail" style="width: 200px; height: 200px;"><img src="<?php echo $data['userProfile']->image ? SITE_ROOT . '/resources/images/img_profile/' . replace($data['userProfile']->image) : SITE_ROOT .'/templates/admin/assets/img/demoBig.jpg'; ?>" alt="profile_picture" /></div>
                                                    <div id="uploadProfImage" class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 200px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Upload image</span><span class="fileupload-exists">Change</span><input id="fUpload" name="f_upload" type="file" /></span>
                                                        <a id="removeAvatar" href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-profile/<?php echo $data['userProfile']->id ? $data['userProfile']->id : ''; ?>" method="post">                        
                                        <input type="hidden" name="_method" value="patch" />
                                                   
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Name</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_name" id="req" value="<?php echo $data['userProfile']->name ? replace($data['userProfile']->name) : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Surname</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_surname" id="req" value="<?php echo $data['userProfile']->surname ? replace($data['userProfile']->surname) : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Professional Headline</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_profess_headline" id="req" value="<?php echo $data['userProfile']->profess_headline ? replace($data['userProfile']->profess_headline) : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Address</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_address" id="req" value="<?php echo $data['userProfile']->address ? replace($data['userProfile']->address) : '' ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">City</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_city" id="req" value="<?php echo $data['userProfile']->city ? replace($data['userProfile']->city) : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Country</label>
                                            <div class="col-lg-4">
                                                <select name="tb_country" id="sport" class="validate[required] form-control">
                                                    
                                                <?php foreach($data['country'] as $country) { ?>
                                                    
                                                    <option <?php echo ($data['userProfile']->country_id == $country->id) ? 'selected' : '' ?> value="<?php echo $country->id ? $country->id : 1; ?>"><?php echo $country->country? $country->country : ''; ?> (<?php echo $country->country_code? $country->country_code : ''; ?>)</option>

                                                <?php } ?>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Industry</label>
                                            <div class="col-lg-4">
                                                <select name="tb_industry" id="sport" class="validate[required] form-control">
                                                <?php foreach($data['industry'] as $industry) { ?>
                                                    
                                                    <option <?php echo ($data['userProfile']->industry_id == $industry->id) ? 'selected' : '' ?> value="<?php echo $industry->id ? $industry->id : 1; ?>"><?php echo $industry->name? replace($industry->name) : ''; ?></option>

                                                <?php } ?>
                                                </select>
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


