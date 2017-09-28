<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-ok-sign"></i>
                            <span class="btn">Certifications <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?></span>
                        
                            <a href="<?php echo SITE_ROOT; ?>/admin-certifications/" class="btn btn-primary pull-right"><i class="icon-pencil"></i> Add New </a>
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
                                            <th>Starting</th>
                                            <th>Name</th>
                                            <th>Authority</th>
                                            <th>Url</th>
                                            <th>Licence Number</th>                                            
                                            <th><i class="icon-check-sign"></i> Visible</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                                                   
                                    <tbody>
                                        
                                        <?php 
                                            if(isset($data['certification'])) {

                                                foreach ($data['certification'] as $certification) {                                          

                                        ?> 
                                        <!--moze i ovako, kada je id u pitanju-->
                                        <tr id="row<?php echo ($certification->id) ? $certification->id : 1; ?>" class="odd gradeX">
                                            <td class=""><?php echo ($certification->certif_month) ? $certification->certif_month : '' ?> <?php echo ($certification->certif_year) ? $certification->certif_year : '' ?></td>
                                            <td><?php echo ($certification->name) ? replace($certification->name) : '' ?></td> 
                                            <td><?php echo ($certification->authority) ? replace($certification->authority) : '' ?></td>
                                            <td><?php echo ($certification->certif_url) ? $certification->certif_url : '' ?></td>
                                            <td><?php echo ($certification->licence_number) ? replace($certification->licence_number) : '' ?></td>
                                            <td class="">
                                                <center>
                                                    <i id="icon<?php echo ($certification->id) ? $certification->id : 1; ?>" data-id-status="<?php echo ($certification->id) ? $certification->id : 1; ?>" class="<?php echo ($certification->status == CERTIF_VISIBLE) ? 'statusVisible icon-check-sign' : 'statusUnvisible icon-minus-sign-alt'; ?>" style="cursor: pointer;"></i>
                                                </center>
                                            </td>
                                            <td class="">
                                                <center>
                                                    <a class="update" href="admin-certifications/<?php echo ($certification->id) ? $certification->id : 1; ?>">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="deleteBtn" data-id="<?=($certification->id) ? $certification->id : ''?>" href="">
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
    
    var id =  $(this).attr('data-id');
    //var value = $(this).val();
    
    $.ajax({
            
            url: 'admin-certifications-delete/'+id,      
            type: 'POST',        
            dataType: 'json',
       
            success: function(response) {
                
                console.log(response);             
                if(response.error == false){

                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
                    //$("#row"+response.id).remove(); ovo ispod je bezbednije, ali moze i ovako
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
            
            url: 'admin-certifications-unvisible/'+id,      
            type: 'POST',        
            dataType: 'json',
//       
            success: function(response) {
                
                console.log(response);             
//                if(response.error == false){
                    
//                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
                    $('#icon'+response.id).addClass('statusUnvisible icon-minus-sign-alt');
                    //$("#row"+response.id).remove(); ovo ispod je bezbednije, ali moze i ovako
//                    
//                } else {
//                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
//                }       
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
            
            url: 'admin-certifications-visible/'+id,      
            type: 'POST',        
            dataType: 'json',
//       
            success: function(response) {
                
                console.log(response);             
//                if(response.error == false){
                    
//                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
                    $('#icon'+response.id).addClass('statusVisible icon-check-sign');
                    //$("#row"+response.id).remove(); ovo ispod je bezbednije, ali moze i ovako
                    
//                } else {
//                    $("#message").html(response.message ).addClass( "alert alert-danger alert-dismissable" );
//                }       
            },
            
            error: function() {
                console.log('Greska');
            }
        });      
   
});
    
</script>
