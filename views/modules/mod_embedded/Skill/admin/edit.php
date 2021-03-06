<div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-pencil"></i></div>
                                    <h5>Edit Skill</h5>
                                </header>
                                
                                <div id ="message" class="">
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
                                </div>
                                
                                <?php 
                                    if(isset($data['skill'])) {
                                ?>
                                
                                <div id="collapse2" class="body collapse in">
                                    
                                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-skills-update/<?php echo $data['skill']->id ? $data['skill']->id : ''; ?>" method="post">                        
                                        <input type="hidden" name="_method" value="patch" />
                                                   
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Name *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_name" id="req" value="<?php echo $data['skill']->name ? replace($data['skill']->name) : '' ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Persent *</label>
                                            <div class="col-lg-4">
                                                <div class="input-group">
                                                    <input type="text" class="validate[required] form-control" name="tb_persentage" id="req" value="<?php echo $data['skill']->persentage ? $data['skill']->persentage : '' ?>" />
                                                    <span class="input-group-addon">%</span>
                                                </div>
                                            </div>    
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Visible</label>
                                            <div class="checkbox col-lg-4">
                                                <label>
                                                    <!--<div class="col-lg-4">-->
                                                        <input name="tb_status" type="checkbox" value="<?php echo $data['skill']->status ? $data['skill']->status : ''; ?>" <?php echo $data['skill']->status == SKILL_VISIBLE ? 'checked' : '' ?> />Check if you want this skill will be visible on the web
                                                    <!--</div>-->
                                                </label>
                                            </div>
                                        </div>

                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input id="submit" type="submit" name="btn_submit" value="Update" class="btn btn-primary btn-lg " />
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
                    
                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
                } else {
                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response);
            }
        });       
    });
    
</script>