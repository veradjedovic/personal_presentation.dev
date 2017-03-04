<div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-pencil"></i></div>
                                    <h5>Edit Certification</h5>
                                </header>
                                
                                <div id ="message" class="">
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
                                </div>
                                
                                <?php 
                                    if(isset($data['certification'])) {
                                ?>
                                
                                <div id="collapse2" class="body collapse in">
                                    
                                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-certifications-update/<?php echo $data['certification']->id ? $data['certification']->id : ''; ?>" method="post">                        
                                        <input type="hidden" name="_method" value="patch" />
                                                   
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Name *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_name" id="req" value="<?php echo $data['certification']->name ? replace($data['certification']->name) : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Authority *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_authority" id="req" value="<?php echo $data['certification']->authority ? replace($data['certification']->authority) : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Licence number</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_licence_number" value="<?php echo $data['certification']->licence_number ? replace($data['certification']->licence_number) : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Certification url</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_certif_url" value="<?php echo $data['certification']->certif_url ? $data['certification']->certif_url : '' ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Month From *</label>
                                            <div class="col-lg-4">
                                                <select name="tb_month" id="sport" class="validate[required] form-control">
                                                    
                                                <?php 
                                                
                                                if(isset($data['months'])) {
                                                
                                                    foreach($data['months'] as $month) { ?>

                                                        <option <?php echo ($data['certification']->certif_month == $month) ? 'selected' : '' ?> value="<?php echo $month ? $month : 'January'; ?>"><?php echo $month ? $month : 'January'; ?></option>

                                                <?php 
                                                    }
                                                }                    
                                                ?>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Year From *</label>
                                            <div class="col-lg-4">
                                                <select name="tb_year" id="sport" class="validate[required] form-control">
                                                <?php 
                                                if(isset($data['year_begin']) && isset($data['year_end'])) {
                                                
                                                    for($i=$data['year_end']; $i>$data['year_begin']; $i--) { ?>

                                                        <option <?php echo ($data['certification']->certif_year == $i) ? 'selected' : '' ?> value="<?php echo $i ? $i : date('Y'); ?>"><?php echo $i ? $i : date('Y'); ?></option>

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
                                                        <input name="tb_status" type="checkbox" value="<?php echo $data['certification']->status ? $data['certification']->status : ''; ?>" <?php echo $data['certification']->status == CERTIF_VISIBLE ? 'checked' : '' ?> />Check if you want that cartification will be visible on the web
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


