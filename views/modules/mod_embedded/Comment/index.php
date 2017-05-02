<!-- Comments -->
<div id="comments" class="blog-recent-comments panel panel-default margin-bottom-30">
    <div class="panel-heading">
        <h3>Komentari</h3>
    </div>
    <ul class="list-group">

        <?php
            if(!empty($data['comments']) && !empty($data['comments'])) {
                foreach ($data['comments'] as $item) {
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 profile-thumb">
                                <button class="btn btn-lg btn-primary disabled" type="button">
                                    <i class="media-object fa fa-user fa-4x color-gray-light"></i>
                                    <!--                                                    <img class="media-object" src="" alt="">-->
                                </button>
                            </div>
                            <div class="col-md-10">
                                <h4><?php echo ($item->name) ? replace($item->name) : ''; ?></h4>
                                <p class="text-justify">
                                    <?php echo ($item->content) ? replace($item->content) : ''; ?>
                                </p>
                                <span class="date">
                                    <i class="fa fa-clock-o color-gray-light"></i> <?php echo ($item->created_at) ? date('d\.m\.Y', strtotime($item->created_at)) : ''; ?> at <?php echo ($item->created_at) ? date('H:i:s', strtotime($item->created_at)) : ''; ?>
                                </span>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            } else {
                ?>
                    <li class="list-group-item">
                        <?php echo !empty($data['messageException']) ? $data['messageException'] : 'Nije pronađen ni jedan komentar.'; ?>
                    </li>
                <?php
                        }
                ?>
        <!-- Comment Form -->
        <li class="list-group-item">
            <div class="blog-comment-form">
                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <h3>Ostavite komentar</h3>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <div class="pull-left">
                            <div class="message"></div>
                        </div>
                    </div>
                </div>
                <div class="row margin-top-20">
                    <div class="col-md-12">
                        <form class ="formInsert" action="/comments/<?php echo (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : '' ; ?>"  method ="post">
                            <label>Ime
                                <span>*</span>
                            </label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-7 col-md-offset-0">
                                    <input class="form-control" type="text" name="tb_name">
                                </div>
                            </div>
                            <label>Email
                                <span>*</span>
                            </label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-7 col-md-offset-0">
                                    <input class="form-control" type="text" name="tb_email">
                                </div>
                            </div>
                            <label>Tekst komentara
                                <span>*</span>
                            </label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-11 col-md-offset-0">
                                    <textarea class="form-control" rows="8" name="tb_content"></textarea>
                                </div>
                            </div>
                            <p>
                                <button class="submit btn btn-primary" type="submit" name="btn_submit">Pošalji komentar</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </li>
        <!-- End Comment Form -->
    </ul>
</div>
<!-- End Comments -->

<!-- GLOBAL SCRIPTS -->
<?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_scripts/index.php"; ?>
<!-- END GLOBAL SCRIPTS -->

<script type="text/javascript">

    $('.submit').click(function(e){

        e.preventDefault();
        $(".message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({

            url: $('.formInsert').attr('action'),
            type: $('.formInsert').attr('method'),
            data: $('.formInsert').serialize(),
            dataType: 'json',

            success: function(response) {

                if(response.error == false){

                    $(".formInsert")[0].reset();
                    $(".message").html(response.message).addClass( "alert alert-success alert-dismissable" );
                } else {
                    $(".message").html(response.message).addClass( "alert alert-danger alert-dismissable" );
                }
                console.log(response);
            }
        });
    });

</script>