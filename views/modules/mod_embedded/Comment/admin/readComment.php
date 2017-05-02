<div class="row">
    <div class="col-lg-12">
        <div class="box">

            <header class="dark">
                <div class="icons"><i class="icon-comment"></i></div>
                <h5> Comment </h5>
            </header>
            
            <?php
            if(isset($data['comment'])) {
                ?>
                <div id="collapse2" class="body collapse in">

                    <form class="formInsert form-horizontal" id="popup-validation" action="admin-comments-visible/<?php echo $data['comment']->id ? $data['comment']->id : ''; ?>" method="post">

                        <div class="form-group">
                            <label class="control-label col-lg-4"></label>
                            <div class="col-lg-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <p> <span>From:</span> <?php echo ($data['comment']->name) ? replace($data['comment']->name) : ''; ?> (<?php echo ($data['comment']->email) ? $data['comment']->email : ''; ?>) </p>
                                    </div>
                                    <div class="panel-body">
                                        <br />
                                        <p><?php echo ($data['comment']->content) ? replace($data['comment']->content) : ''; ?></p>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="text-align:center" class="form-actions no-margin-bottom">
                            <input data-toggle="modal" data-target="#notificationModal" id="submit" type="submit" name="btn_submit" class="btn btn-primary" value="Approve" />
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


<div class="col-lg-12">
    <div class="modal" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
<!--                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                    <h4 class="modal-title" id="myModalLabel">Information</h4>
                </div>
                <div id="message" class="modal-body">
                </div>
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
        $("#message").html("");

        $.ajax({

            url: $('.formInsert').attr('action'),
            type: $('.formInsert').attr('method'),
            data: $('.formInsert').serialize(),
            dataType: 'json',

            success: function(response) {

                if(response.error == false){

                    $("#message").html(response.message);
                    setTimeout("location.href='/admin-comments-list/';",2000);
                } else {
                    $("#message").html(response.message).addClass( "alert alert-danger alert-dismissable" );
                    setTimeout("location.href='/admin-comments-list/';",2000);
                }
                console.log(response.message);
            }
        });
    });

</script>