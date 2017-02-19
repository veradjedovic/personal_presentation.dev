<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-pencil"></i></div>
                <h5>Add Project</h5>
            </header>

            <div id ="message" class="">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
            </div>

                <div id="collapse2" class="body collapse in">
                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-projects/" method="post">                        

                        <div class="form-group">
                            <label class="control-label col-lg-4">Project Nmame *</label>
                            <div class="col-lg-4">
                                <input type="text" class="validate[required] form-control" name="tb_name" id="req" placeholder="Add a project name..." />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-lg-4">Project Url</label>
                            <div class="col-lg-4">
                                <input type="text" class="validate[required] form-control" name="tb_url" placeholder="http://..." />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-lg-4">Month From *</label>
                            <div class="col-lg-4">
                                <select name="tb_month" id="sport" class="validate[required] form-control">
                                    <option value="">Choose option...</option>                
                                    <?php 
                                                
                                        if(isset($data['months'])) {
                                                
                                            foreach($data['months'] as $month) { ?>

                                                <option value="<?php echo $month ? $month : 'January'; ?>"><?php echo $month ? $month : 'January'; ?></option>

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
                            <label class="control-label col-lg-4">Description</label>
                            <div class="col-lg-4">
                                <textarea class="form-control" name="ta_description" placeholder="Enter a text..." rows="7"></textarea>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="control-label col-lg-4">Visible</label>
                            <div class="checkbox col-lg-4">
                                <label>
                                    <!--<div class="col-lg-4">-->
                                    <input name="tb_status" type="checkbox" value="" />Check if you want this project will be visible on the web
                                    <!--</div>-->
                                </label>
                            </div>
                        </div>                                      

                        <div style="text-align:center" class="form-actions no-margin-bottom">
                            <input id="submit" type="submit" name="btn_submit" value="Submit" class="btn btn-primary btn-lg " />
                        </div>
                    </form>
                </div>

                <?php

                    echo isset($data['messageException']) ? $data['messageException'] : '';
                ?>

        </div>
    </div>
</div>    

<!-- GLOBAL SCRIPTS -->
<?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_scripts/index.php"; ?>
<!-- END GLOBAL SCRIPTS -->

<script type="text/javascript">

    $('#submit').click(function (e) {

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({
            url: $('.formInsert').attr('action'),
            type: $('.formInsert').attr('method'),
            data: $('.formInsert').serialize(),
            dataType: 'json',
            success: function (response) {

                if (response.error == false) {

                    $(".formInsert")[0].reset();
                    $("#message").html(response.message).addClass("alert alert-success alert-dismissable");
                } else {
                    $("#message").html(response.message).addClass("alert alert-danger alert-dismissable");
                }
                console.log(response.message);
            }
        });
    });

</script>
