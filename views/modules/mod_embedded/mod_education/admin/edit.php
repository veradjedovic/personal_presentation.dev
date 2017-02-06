<div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-pencil"></i></div>
                                    <h5>Edit Education</h5>
                                </header>
                                
                                <div id ="message" class="">
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
                                </div>
                                
                                <?php 
                                    if(isset($data['education'])) {
                                ?>
                                
                                <div id="collapse2" class="body collapse in">
                                    
                                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-education-update/<?php echo $data['education']->id ? $data['education']->id : ''; ?>" method="post">                        
                                        <input type="hidden" name="_method" value="patch" />
                                                   
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">School *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_school" id="req" value="<?php echo $data['education']->school ? $data['education']->school : '' ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Degree *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_degree" id="req" value="<?php echo $data['education']->degree ? $data['education']->degree : '' ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Field of Study *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_field_of_study" id="req" value="<?php echo $data['education']->field_of_study ? $data['education']->field_of_study : '' ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Description</label>
                                            <div class="col-lg-4">
                                                <textarea class="form-control" name="ta_description" rows="7"><?php echo $data['education']->description ? $data['education']->description : '' ?></textarea>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">From *</label>
                                            <div class="col-lg-4">
                                                <select name="tb_year_from" id="sport" class="validate[required] form-control">
                                                <?php 
                                                if(isset($data['year_begin']) && isset($data['year_end'])) {
                                                
                                                    for($i=$data['year_end']; $i>$data['year_begin']; $i--) { ?>

                                                        <option <?php echo ($data['education']->year_from == $i) ? 'selected' : '' ?> value="<?php echo $i ? $i : date('Y'); ?>"><?php echo $i ? $i : date('Y'); ?></option>

                                                    <?php 
                                                    }
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">To *</label>
                                            <div class="col-lg-4">
                                                <select name="tb_year_to" id="sport" class="validate[required] form-control">
                                                <?php 
                                                if(isset($data['year_begin']) && isset($data['year_end'])) {
                                                
                                                    for($i=$data['year_end']; $i>$data['year_begin']; $i--) { ?>

                                                        <option <?php echo ($data['education']->year_to == $i) ? 'selected' : '' ?> value="<?php echo $i ? $i : date('Y'); ?>"><?php echo $i ? $i : date('Y'); ?></option>

                                                    <?php 
                                                    }
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Visible</label>
                                            <div class="checkbox col-lg-4">
                                                <label>
                                                    <!--<div class="col-lg-4">-->
                                                        <input name="tb_status" type="checkbox" value="<?php echo $data['education']->status ? $data['education']->status : ''; ?>" <?php echo $data['education']->status == EDUCATION_VISIBLE ? 'checked' : '' ?> />Check if you want this education will be visible on the web
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


