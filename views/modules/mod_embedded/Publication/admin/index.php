<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-book"></i>
                            <span class="btn">Publications <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?></span>
                        
                            <a href="<?php echo SITE_ROOT; ?>/admin-publications/" class="btn btn-primary pull-right"><i class="icon-pencil"></i> Add New </a>
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
                                            <th>Title</th>
                                            <th>Publisher</th>
                                            <th>Authors</th>
                                            <th>Url</th> 
                                            <th>Document</th>
                                            <th>Description</th>
                                            <th><i class="icon-check-sign"></i> Visible</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                                                   
                                    <tbody>
                                        
                                        <?php 
                                            if(isset($data['publications'])) {

                                                foreach ($data['publications'] as $item) {                                          

                                        ?> 
                                        <!--moze i ovako, kada je id u pitanju-->
                                        <tr id="row<?php echo ($item->id) ? $item->id : 1; ?>" class="odd gradeX">
                                            <td class=""><?php echo ($item->publ_month) ? $item->publ_month : '' ?> <?php echo ($item->publ_year) ? $item->publ_year : '' ?></td>
                                            <td class=""><?php echo ($item->title) ? replace($item->title) : '' ?></td>
                                            <td class=""><?php echo ($item->publisher) ? replace($item->publisher) : '' ?></td>
                                            <td><?php echo ($item->author) ? replace($item->author) : '' ?>
                                                <a class="update pull-right" href="admin-publications-authors-list/<?php echo ($item->id) ? $item->id : 1; ?>">
                                                    <i class="icon-edit"></i>
                                                </a>
                                            </td> 
                                            <td><?php echo ($item->publ_url) ? $item->publ_url : '' ?></td>
                                            <td><?php echo ($item->document_name) ? replace($item->document_name) : '' ?></td>
                                            <td><?php echo ($item->description) ? (strlen($item->description) > 40 ? substr(replace($item->description), 0, 40). "..." : replace($item->description)) : '' ?></td>
                                            <td class="">
                                                <center>
                                                    <i id="icon<?php echo ($item->id) ? $item->id : 1; ?>" data-id-status="<?php echo ($item->id) ? $item->id : 1; ?>" class="<?php echo ($item->status == PUBL_VISIBLE) ? 'statusVisible icon-check-sign' : 'statusUnvisible icon-minus-sign-alt'; ?>" style="cursor: pointer;"></i>
                                                </center>
                                            </td>
                                            <td class="">
                                                <center>
                                                    <a class="update" href="admin-publications/<?php echo ($item->id) ? $item->id : 1; ?>">
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
            
            url: 'admin-publications-delete/'+id,      
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
            
            url: 'admin-publications-unvisible/'+id,      
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
            
            url: 'admin-publications-visible/'+id,      
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
