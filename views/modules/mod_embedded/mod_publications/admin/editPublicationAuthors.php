<div class="row">
    <div class="col-lg-12">
        <div id ="message" class="success">                  
                                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->                                      
        </div>
    </div>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-pencil"></i>
                            Add New Author
                        </div>

                            <div class="panel-body">
                                <div class="table-responsive">                                                         
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Author Name</th>
                                                    <th>Author Surname</th>
                                                    <th>Add New</th>
                                                </tr>
                                            </thead>                                                                   
                                            <tbody>
                                                <form class="formInsert" method="post" action="admin-publications-authors-insert/<?php echo $data['publication_id'] ? $data['publication_id'] : ''; ?>" >
                                                    <tr>
                                                        <td class=""><input style="border: 0px solid white; background-color: transparent; display: block;" type="text" class="validate[required]" name="tb_name" id="req" placeholder="Enter a name..." /></td>
                                                        <td class=""><input style="border: 0px solid white; background-color: transparent; display: block;" type="text" class="validate[required]" name="tb_surname" id="req" placeholder="Add a surname..." /></td>
                                                        <td>
                                                            <center>
                                                                <input id="submit" type="submit" name="btn_submit" value="Add New" class="btn btn-primary btn-xs btn-flat" />
                                                            </center>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </tbody>                                  
                                        </table>
                                </div>
                            </div>
                    </div>
                </div>
    
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-trash"></i>
                            Delete Author <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">                                                         
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Author</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                                                   
                                    <tbody id="table_del">
                                        
                                        <?php 
                                            if(isset($data['authors'])) {

                                                foreach ($data['authors'] as $item) {                                          

                                        ?> 
                                        <!--moze i ovako, kada je id u pitanju-->
                                        <tr id="row<?php echo ($item->id) ? $item->id : 1; ?>" class="odd gradeX">
                                            <td class=""><?php echo ($item->author_name) ? $item->author_name : '' ?> <?php echo ($item->author_surname) ? $item->author_surname : '' ?></td>
                                            <td><?php 
                                                    if ($_SESSION['name'] == $item->author_name && $_SESSION['surname'] == $item->author_surname) {
                                                ?>
                                                <center>
                                                    <i class="icon-ban-circle"></i>
                                                </center>
                                                <?php       
                                                    } else {
                                                ?>
                                                <center>
                                                    <a class="deleteBtn" href="admin-publications-authors-delete/<?php echo ($item->id) ? $item->id : 1; ?>">
                                                        <i class="submit icon-trash"></i>
                                                    </a>
                                                </center>
                                                <?php 
                                                    }
                                                ?>
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

$('#submit').click(function (e) {

        e.preventDefault();       
        $("#message").html("").removeClass("alert alert-success alert-danger alert-dismissable");

        $.ajax({
            url: $('.formInsert').attr('action'),
            type: $('.formInsert').attr('method'),
            data: $('.formInsert').serialize(),
            dataType: 'json',
            success: function (response) {

                if (response.error == false) {

                    $(".formInsert")[0].reset();
                    $("#message").html(response.message).addClass("alert alert-success alert-dismissable");
                    $('#table_del').append('<tr id="row' + response.author.id + '"><td>' + response.author.author_name + ' ' + response.author.author_surname + '</td><td><center><a class="deleteBtn" href="admin-projects-members-delete/' + response.author.id + '"><i class="submit icon-trash"></i></a></center></td></tr>');
                } else {
                    $("#message").html(response.message).addClass("alert alert-danger alert-dismissable");
                }
                console.log(response.message);
            }
        });
    });

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
