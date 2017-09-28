<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="icon-font"></i>
                <span class="btn">Comments <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?></span>

                <a href="<?php echo SITE_ROOT; ?>/admin-comments/" class="btn btn-primary pull-right"><i class="icon-pencil"></i> Add New </a>
                <div style="clear: both;"></div>
            </div>

            <div id ="message" class="success">
                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Content</th>
                            <th>Article</th>
                            <th><i class="icon-check-sign"></i> Approved</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($data['comments'])) {

                            foreach ($data['comments'] as $item) {

                                ?>
                                <!--moze i ovako, kada je id u pitanju-->
                                <tr id="row<?php echo ($item->id) ? $item->id : 1; ?>" class="odd gradeX">
                                    <td class=""><?php echo ($item->created_at) ? date('d\.m\.Y h\:i', strtotime($item->created_at)) : '' ?></td>
                                    <td class=""><?php echo ($item->name) ? replace($item->name) : '' ?></td>
                                    <td><?php echo ($item->email) ? replace($item->email) : '' ?></td>
                                    <td><?php echo ($item->content) ? (strlen($item->content) > 40 ? htmlspecialchars_decode(substr(replace($item->content), 0, 40)). "..." : htmlspecialchars_decode(replace($item->content))) : '' ?></td>
                                    <td><?php echo ($item->article) ? replace($item->article) : '' ?></td>
                                    <td class="">
                                        <center>
                                            <i id="icon<?php echo ($item->id) ? $item->id : 1; ?>" data-id-status="<?php echo ($item->id) ? $item->id : 1; ?>" class="<?php echo ($item->status == COMMENT_APPROVED) ? 'statusVisible icon-check-sign' : 'statusUnvisible icon-minus-sign-alt'; ?>" style="cursor: pointer;"></i>
                                        </center>
                                    </td>
                                    <td class="">
                                        <center>
                                                <?php
                                                    echo (!empty($item->name) && (replace($item->name) == "Admin")) ? "<a class='update' href='admin-comments/" . ($item->id ? $item->id : 1) . "'><i class='icon-edit'></i></a>" : "<a class='update' href='admin-comments-read/" . ($item->id ? $item->id : 1) . "'><i class='icon-file-alt'></i></a>";
                                                    ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a class="deleteBtn" data-id="<?=($item->id) ? $item->id : ''?>" href="">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </center>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- GLOBAL SCRIPTS -->
<?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_scripts/index.php"; ?>
<!-- END GLOBAL SCRIPTS -->

<script type="text/javascript">

    $('.deleteBtn').click(function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        var id = $(this).attr('data-id');

        $.ajax({

            url: 'admin-comments-delete/'+id,
            type: 'POST',
            dataType: 'json',

            success: function(response) {

                console.log(response);
                if(response.error == false){

                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
                    $('tbody > tr#row'+response.id).remove();
                    setTimeout(function(){ location.reload(); }, 1500);
                } else {
                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
                }
            },

            error: function() {
                console.log('Greska');
            }
        });

    });

    $('body').on('click', '.statusVisible', function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");
        $(this).removeClass('statusVisible icon-check-sign');

        var id =  $(this).attr('data-id-status');

        $.ajax({

            url: 'admin-comments-unvisible/'+id,
            type: 'POST',
            dataType: 'json',
            success: function(response) {

                console.log(response);
                $('#icon'+response.id).addClass('statusUnvisible icon-minus-sign-alt');
            },
            error: function() {
                console.log('Greska');
            }
        });
    });

    $('body').on('click', '.statusUnvisible', function(e){

        e.preventDefault();
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");
        $(this).removeClass('statusUnvisible icon-minus-sign-alt');

        var id =  $(this).attr('data-id-status');

        $.ajax({

            url: 'admin-comments-visible/'+id,
            type: 'POST',
            dataType: 'json',
            success: function(response) {

                console.log(response);
                $('#icon'+response.id).addClass('statusVisible icon-check-sign');
            },

            error: function() {
                console.log('Greska');
            }
        });
    });

</script>

