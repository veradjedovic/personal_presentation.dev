 
                            <!-- Main Content -->
                            <div class="headline">
                                <h2>Kontakt forma</h2>
                                <br />
                            </div>
                            <p>Ukoliko želite da kontaktirate autora sajta, pošaljite poruku putem ove kontakt forme.</p>
                            <br>
                            <div class="message"></div>
                            <!-- Contact Form -->
                            <form class ="formInsert" action="/kontakt/<?php echo (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 1 ; ?>"  method ="post">
                                <label>Naslov poruke
                                    <span class="color-red">*</span>
                                </label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-6 col-md-offset-0">
                                        <input class="contact form-control" type="text" name="tb_subject" value="" />
                                    </div>
                                </div>
                                <label>Email adresa
                                    <span class="color-red">*</span>
                                </label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-6 col-md-offset-0">
                                        <input class="contact form-control" type="text" name="tb_email" value="" />
                                    </div>
                                </div>
                                <label>Poruka
                                    <span class="color-red">*</span>
                                </label>
                                <div class="row margin-bottom-20">
                                    <div class="col-md-8 col-md-offset-0">
                                        <textarea class="contact textarea form-control" rows="8" cols="50" name="tb_message"></textarea>
                                    </div>
                                </div>
                                <p>
                                    <button class="submit button_small btn btn-primary" type="submit" name="btn_submit">Posalji</button>
                                </p>
                            </form>
                            <!-- End Contact Form -->
                            <!-- End Main Content -->

<!-- GLOBAL SCRIPTS -->
    <?php include APP_PATH . "views/modules/mod_external/mod_admin_template/mod_scripts/index.php"; ?>
<!-- END GLOBAL SCRIPTS -->
<script type="text/javascript">
    
    $('.submit').click(function(e){
       
        e.preventDefault();      
        $(".message").html("");
        
        $.ajax({
            
            url: $('.formInsert').attr('action'),      
            type: $('.formInsert').attr('method'),         
            data: $('.formInsert').serialize(),       
            dataType: 'json',
            
            success: function(response) {
                
                $(".formInsert")[0].reset();
                $(".message").append('<p>' + response.message + '</p>');
                console.log(response.message);
            }
        });      
    });
    
</script>