<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-ok-sign"></i>
                            Certifications <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?>
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
                                            <td><?php echo ($certification->name) ? $certification->name : '' ?></td> 
                                            <td><?php echo ($certification->authority) ? $certification->authority : '' ?></td> 
                                            <td><?php echo ($certification->licence_number) ? $certification->licence_number : '' ?></td>
                                            <td class="" id="ceil<?php echo ($certification->id) ? $certification->id : 1; ?>">
                                                <center>
                                                    <?php echo ($certification->status == CERTIF_VISIBLE) ? '<i class="icon-check-sign"></i>' : '<i class="icon-minus-sign-alt"></i>' ?>
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
                                                    <a class="insert" href="admin-certifications-delete/<?php echo ($certification->id) ? $certification->id : 1; ?>">
                                                        <i class="submit icon-trash"></i>
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

//var submitBtn = $('.insert');
//this.submitBtn.click(function(e)
//{           
//        e.preventDefault(); 
//        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");
//        
//        $.ajax({
//            
//            url: $('.insert').attr('href'),      
//            type: 'post',         
////            data: '',       
//            dataType: 'json',
//       
//            success: function(response) {
//                
//                console.log(response.id);             
//                if(response.error == false){
//                    
//                    $("#message").html(response.message ).addClass( "alert alert-success alert-dismissable" );
//                    //$("#row"+response.id).remove(); ovo ispod je bezbednije, ali moze i ovako
//                    $('tbody > tr#row'+response.id).remove();
//                } else {
//                    $("#message").append(response.message ).addClass( "alert alert-danger alert-dismissable" );
//                }       
//            },
//            
//            error: function() {
//                console.log('Greska');
//            }
//        });       
//    });
    
</script>
