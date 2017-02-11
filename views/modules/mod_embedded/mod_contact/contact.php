<h2>Contact Us</h2>
<div class="message"></div>
<form class ="formInsert" action="/kontakt/<?php echo (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 1 ; ?>"  method ="post">
    <table>
        <tr>
            <td><span>Naslov poruke *</span></td><td><input class="contact" type="text" name="tb_subject" value="" /></td>
        </tr>
        <tr>
            <td><span>Email adresa *</span></td><td><input class="contact" type="text" name="tb_email" value="" /></td>
        </tr>
        <tr>
            <td><span>Poruka *</span></td><td><textarea class="contact textarea" rows="8" cols="50" name="tb_message"></textarea></td>
        </tr>
        <tr>
            <td></td><td><span>&nbsp;</span><button class="submit button_small" type="submit" name="btn_submit">Posalji</button></td>
        </tr>
    </table>
</form>

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