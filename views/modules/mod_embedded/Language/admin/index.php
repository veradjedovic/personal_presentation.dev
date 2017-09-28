<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-globe"></i>
                            <span class="btn">Languages <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?></span>
                        
                            <a href="<?php echo SITE_ROOT; ?>/admin-languages/" class="btn btn-primary pull-right"><i class="icon-pencil"></i> Add New </a>
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
                                            <th>Language</th>
                                            <th>Proficiency</th>
                                            <th><i class="icon-check-sign"></i> Visible</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                                                   
                                    <tbody>
                                        
                                        <?php 
                                            if(isset($data['languages'])) {

                                                foreach ($data['languages'] as $item) {                                          

                                        ?> 
                                        <!--moze i ovako, kada je id u pitanju-->
                                        <tr id="row<?php echo ($item->id) ? $item->id : 1; ?>" class="odd gradeX">
                                            <td><?php echo ($item->name) ? replace($item->name) : '' ?></td> 
                                            <td><?php echo ($item->proficiency) ? $item->proficiency : '' ?></td>
                                            <td class="">
                                                <center>
                                                    <i id="icon<?php echo ($item->id) ? $item->id : 1; ?>" data-id-status="<?php echo ($item->id) ? $item->id : 1; ?>" class="<?php echo ($item->status == LANG_VISIBLE) ? 'statusVisible icon-check-sign' : 'statusUnvisible icon-minus-sign-alt'; ?>" style="cursor: pointer;"></i>
                                                </center>
                                            </td>
                                            <td class="">
                                                <center>
                                                    <a class="update" href="admin-languages/<?php echo ($item->id) ? $item->id : 1; ?>">
                                                        <i class="icon-edit"></i>
                                                    </a>
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
    
    var id =  $(this).attr('data-id');
    
    $.ajax({
            
            url: 'admin-languages-delete/'+id,      
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
            
            url: 'admin-languages-unvisible/'+id,      
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
            
            url: 'admin-languages-visible/'+id,      
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
