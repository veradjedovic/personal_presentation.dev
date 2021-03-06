<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <header class="dark">
                <div class="icons"><i class="icon-pencil"></i></div>
                <h5>Edit Comment</h5>
            </header>

            <div id ="message" class="">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
            </div>

            <?php
            if(isset($data['comment'])) {
                ?>

                <div id="collapse2" class="body collapse in">
                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-comments-update/<?php echo $data['comment']->id ? $data['comment']->id : ''; ?>" method="post">
                        <input type="hidden" name="_method" value="patch" />
                        <div class="form-group">
                            <label class="control-label col-lg-4">Approved</label>
                            <div class="checkbox col-lg-4">
                                <label>
                                    <!--<div class="col-lg-4">-->
                                    <input name="tb_status" type="checkbox" value="<?php echo $data['comment']->status ? $data['comment']->status : ''; ?>" <?php echo ($data['comment']->status == COMMENT_APPROVED ) ? 'checked' : '' ?> />Check to approve this comment
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
                                            <textarea class="form-control" name="ta_content" rows="10" id="wysihtml5"><?php echo $data['comment']->content ? replace($data['comment']->content) : ''; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="preview">
                                        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div style="text-align:center" class="form-actions no-margin-bottom">
                            <input id="submit" type="submit" name="btn_submit" value="Update" class="btn btn-primary btn-lg" />
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

</script>
