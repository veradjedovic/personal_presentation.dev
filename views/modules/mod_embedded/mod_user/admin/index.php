<div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header>
                                    <div class="icons"><i class="icon-cloud"></i></div>
                                    <h5>Edit Credentials</h5>                                  
                                </header>
                                
                                    <div id ="message" class="">
                                        <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                                        
                                    </div>
                                
                                    <?php 
                                        if(isset($data['user'])) {
                                    ?>

                                    <div id="collapseOne" class="accordion-body collapse in body">
                                    
                                    <form id="popup-validation" action="admin-user/<?php echo $data['user']->id ? $data['user']->id : ''; ?>" method ="post" class="formInsert form-horizontal" id="block-validate">
                                        <input type="hidden" name="_method" value="patch" />
                                        <input type="hidden" name="tb_token" value="<?php echo $data['user']->token ? $data['user']->token : ''; ?>" />
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">E-mail *</label>

                                            <div class="col-lg-4">
                                                <input type="email" id="req" name="tb_email" class="validate[required] form-control" placeholder="Enter email..." value="<?php echo $data['user']->email ? $data['user']->email : ''; ?>" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Password *</label>

                                            <div class="col-lg-4">
                                                <input type="password" id="req" name="tb_password" class="validate[required] form-control" placeholder="Enter your password..." />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Confirm Password *</label>

                                            <div class="col-lg-4">
                                                <input type="password" id="req" name="tb_confirm_password" class="validate[required] form-control" placeholder="Confirm your password..." />
                                            </div>
                                        </div> 
                                        
                                        <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input id ="submit" type="submit" name ="btn_submit" value="Submit" class="btn btn-primary btn-lg " />
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

                if(response.message == 'Successful update'){
                    
                    $("#message").append(response.message ).addClass( "alert alert-success alert-dismissable" );
                } else {
                    $("#message").append(response.message ).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response.message);
            }
        });       
    });
    
</script>