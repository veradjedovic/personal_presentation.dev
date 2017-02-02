<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-envelope"></i>
                            Messages <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?>
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
                                            <th>From</th>
                                            <th>Subject</th>                                            
                                            <th>Status</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                                                   
                                    <tbody>
                                        
                                        <?php 
                                            if(isset($data['messages'])) {

                                                foreach ($data['messages'] as $message) {                                          

                                        ?> 
                                        <!--moze i ovako, kada je id u pitanju-->
                                        <tr id="row<?php echo ($message->id) ? $message->id : 1; ?>" class="odd gradeX">
                                            <td class=""><?php echo ($message->created_at) ? date('d\.m\.Y h\:i', strtotime($message->created_at)) : '' ?></td>
                                            <td><?php echo ($message->email_from) ? $message->email_from : '' ?></td> 
                                            <td><?php echo ($message->subject) ? $message->subject : '' ?></td>                                                          
                                            <td class="">
                                                <a href="admin-messages/<?php echo ($message->id) ? $message->id : 1; ?>">
                                                <?php echo ($message->status == MESSAGE_READ) ? '<button class="btn">Read</button>' : '<button class="btn btn-success">Unead</button>' ?>
                                                </a>
                                            </td>
                                            <td class="">
                                                <form class="formInsert" action="admin-messages-delete/<?php echo ($message->id) ? $message->id : 1; ?>" method="post" >
                                                    <input type="submit" class="submit btn btn-danger" value="Delete" />
                                                </form>
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

var submitBtn = $('.submit');
this.submitBtn.click(function(e)
{       
        e.preventDefault();      
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");
        var formDelete = $('.formInsert');
        
        $.ajax({
            
            url: $('.formInsert').attr('action'),      
            type: $('.formInsert').attr('method'),         
            data: $('.formInsert').serialize(),       
            dataType: 'json',
       
            success: function(response) {
                
                console.log(response);             
                if(response.error == false){
                    
                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
                    //$("#row"+response.id).remove(); ovo ispod je bezbednije, ali moze i ovako
                    $('tbody > tr#row'+response.id).remove();
                } else {
                    $("#message").append(response.message ).addClass( "alert alert-danger alert-dismissable" );
                }       
            },
            
            error: function() {
                console.log('Greska');
            }
        });       
    });
    
</script>