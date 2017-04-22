<div class="row">
                        <div class="col-lg-12">
                            <div class="box">
                                <header class="dark">
                                    <div class="icons"><i class="icon-pencil"></i></div>
                                    <h5>New Experience</h5>
                                </header>
                                
                                <div id ="message" class="">
                                    <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
                                </div>

                                <div id="collapse2" class="body collapse in">
                                    
                                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-experience/" method="post">                        
                                                   
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Title *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_title" id="req" placeholder="Enter a title..." />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Company *</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_company" id="req" placeholder="Enter a company..." />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">City</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="validate[required] form-control" name="tb_city" placeholder="Enter a city..." />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Country *</label>
                                            <div class="col-lg-4">
                                                <select name="tb_country" id="sport" class="validate[required] form-control">
                                                    <option value="">Chose a country...</option>
                                                <?php 
                                                if(isset($data['countries']) && isset($data['countries'])) {
                                                
                                                    foreach($data['countries'] as $country) { ?>

                                                        <option value="<?php echo $country->id ? $country->id : ''; ?>"><?php echo $country->country ? $country->country : ''; ?>(<?php echo $country->country_code ? $country->country_code : ''; ?>)</option>

                                                    <?php 
                                                    }
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Description</label>
                                            <div class="col-lg-4">
                                                <textarea class="form-control" name="ta_description" rows="7" placeholder="Enter a text..."></textarea>
                                            </div>
                                        </div> 

                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Month From *</label>
                                            <div class="col-lg-4">
                                                <select name="tb_month_from" id="sport" class="validate[required] form-control">
                                                    <option value="">Choose option...</option>
                                                <?php 
                                                if(isset($data['month']) && isset($data['month'])) {
  
                                                    foreach($data['month'] as $month) { ?>

                                                        <option value="<?php echo $month ? $month : 'January'; ?>"><?php echo $month ? $month : 'January'; ?></option>

                                                    <?php 
                                                    }
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">From *</label>
                                            <div class="col-lg-4">
                                                <select name="tb_year_from" id="sport" class="validate[required] form-control">
                                                    <option value="">Choose option...</option>
                                                <?php 
                                                if(isset($data['year_begin']) && isset($data['year_end'])) {
                                                
                                                    for($i=$data['year_end']; $i>$data['year_begin']; $i--) { ?>

                                                        <option value="<?php echo $i ? $i : date('Y'); ?>"><?php echo $i ? $i : date('Y'); ?></option>

                                                    <?php 
                                                    }
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">Month To</label>
                                            <div class="col-lg-4">
                                                <select name="tb_month_to" id="sport" class="validate[required] form-control">
                                                    <option value="">Choose option...</option>
                                                <?php 
                                                if(isset($data['month']) && isset($data['month'])) {

                                                    foreach($data['month'] as $month) { ?>

                                                        <option value="<?php echo $month ? $month : ''; ?>"><?php echo $month ? $month : ''; ?></option>

                                                    <?php 
                                                    }
                                                } 
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label col-lg-4">To</label>
                                            <div class="col-lg-4">
                                                <select name="tb_year_to" id="sport" class="validate[required] form-control">
                                                    <option value="">Choose option...</option>
                                                <?php 
                                                if(isset($data['year_begin']) && isset($data['year_end'])) {
                                                
                                                    for($i=$data['year_end']; $i>$data['year_begin']; $i--) { ?>

                                                        <option value="<?php echo $i ? $i : ''; ?>"><?php echo $i ? $i : ''; ?></option>

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
                                                        <input name="tb_status" type="checkbox" value="" />Check if you want this experience will be visible on the web
                                                    <!--</div>-->
                                                </label>
                                            </div>
                                        </div>

                                        <div style="text-align:center" class="form-actions no-margin-bottom">
                                            <input id="submit" type="submit" name="btn_submit" value="Add New Experience" class="btn btn-primary btn-lg " />
                                        </div>
                                    </form>
                                </div>                               
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
                    
                    $(".formInsert")[0].reset();
                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
                } else {
                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response);
            }
        });       
    });
    
</script>