<h2>Contact Us</h2>
<form action="/kontakt/<?php echo (isset($_GET['id']) && is_numeric($_GET['id'])) ? $_GET['id'] : 1 ; ?>"  method ="post">
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
            <td></td><td><span>&nbsp;</span><input class="submit button_small" type="submit" name="btn_submit" value="Posalji" /></td>
        </tr>
    </table>
</form>