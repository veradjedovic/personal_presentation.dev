<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-pencil"></i></div>
                <h5>Add Publication</h5>
            </header>

            <div id ="message" class="">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
            </div>
            
                <div id="collapse2" class="body collapse in">

                    <form id="popup-validation" class="formUpload form-horizontal" action="admin-publications/" method="post">                         
                        <div class="form-group">
                            <label class="control-label col-lg-4">Upload PDF</label>
                            <div class="col-lg-8">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <span class="btn btn-file btn-default">
                                        <span class="fileupload-new">Select file</span>
                                        <span class="fileupload-exists">Change</span>
                                        <input type="file" id="fUpload" name="f_upload" />
                                    </span>
                                    <span class="fileupload-preview"></span>
                                    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="_method" value="patch" />

                        <div class="form-group">
                            <label class="control-label col-lg-4">Title *</label>
                            <div class="col-lg-4">
                                <input type="text" class="validate[required] form-control" name="tb_title" id="req" placeholder="Enter a title..." />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-4">Publisher *</label>
                            <div class="col-lg-4">
                                <input type="text" class="validate[required] form-control" name="tb_publisher" id="req" placeholder="Enter a publisher..." />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-4">Url</label>
                            <div class="col-lg-4">
                                <input type="text" class="validate[required] form-control" name="tb_url" placeholder="Enter a url..." />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-4">Month From *</label>
                            <div class="col-lg-4">
                                <select name="tb_month" id="sport" class="validate[required] form-control">
                                    <option value="">Choose option...</option>                
                                    <?php
                                    if (isset($data['months'])) {

                                        foreach ($data['months'] as $month) {
                                            ?>

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
                                    if (isset($data['year_begin']) && isset($data['year_end'])) {

                                        for ($i = $data['year_end']; $i > $data['year_begin']; $i--) {
                                            ?>

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
                                <textarea class="form-control" name="ta_description" rows="7" placeholder="Enter a text..."></textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-4">Visible</label>
                            <div class="checkbox col-lg-4">
                                <label>
                                    <!--<div class="col-lg-4">-->
                                    <input name="tb_status" type="checkbox" value="" />Check if you want this publication will be visible on the web
                                    <!--</div>-->
                                </label>
                            </div>
                        </div>                                      

                        <div style="text-align:center" class="form-actions no-margin-bottom">
                            <input id="submit" type="submit" name="btn_submit" value="Add New Publication" class="btn btn-primary btn-lg " />
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
    
    $('#submit').click(function(e){
       
        e.preventDefault();      
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
                    
                    $(".formUpload")[0].reset();
                    $("#message").html(response.message).addClass( "alert alert-success alert-dismissable" );
                } else {
                    $("#message").html(response.message).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response.message);
            }
        });       
    });
    
</script>
