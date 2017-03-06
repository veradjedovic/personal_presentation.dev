<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="icon-font"></i>
                            <span class="btn">Articles <?php echo isset($data['messageException']) ? ' - ' . $data['messageException'] : '';  ?></span>
                            
                            <a href="<?php echo SITE_ROOT; ?>/admin-articles/" class="btn btn-primary pull-right"><i class="icon-pencil"></i> Add New </a>
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
                                            <th>Author</th>
                                            <th>Content</th> 
                                            <th>Page</th>
                                            <th>Image</th>
                                            <th><i class="icon-check-sign"></i> Visible</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>                                                                   
                                    <tbody>
                                        
                                        <?php 
                                            if(isset($data['articles'])) {

                                                foreach ($data['articles'] as $item) {                                          

                                        ?> 
                                        <!--moze i ovako, kada je id u pitanju-->
                                        <tr id="row<?php echo ($item->id) ? $item->id : 1; ?>" class="odd gradeX">
                                            <td class=""><?php echo ($item->updated_at) ? date('d\.m\.Y', strtotime($item->updated_at)) : '' ?></td>
                                            <td class=""><?php echo ($item->title) ? replace($item->title) : '' ?></td>
                                            <td><?php echo ($item->author_name) ? replace($item->author_name) : '' ?> <?php echo ($item->author_surname) ? replace($item->author_surname) : '' ?></td> 
                                            <td><?php echo ($item->content) ? (strlen($item->content) > 40 ? substr(replace($item->content), 0, 40). "..." : replace($item->content)) : '' ?></td> 
                                            <td><?php echo ($item->page) ? replace($item->page) : '' ?></td>
                                            <td><?php echo ($item->image) ? '<img src = "' . SITE_ROOT . '/resources/images/img_for_articles/' . replace($item->image) . '" alt="picture" style="width: 70px;" />' : ''; ?></td>
                                            <td class="">
                                                <center>
                                                    <?php echo ($item->status == ARTICLE_VISIBLE) ? '<i class="icon-check-sign"></i>' : '<i class="icon-minus-sign-alt"></i>' ?>
                                                </center>
                                            </td>
                                            <td class="">
                                                <center>
                                                    <a class="update" href="admin-articles/<?php echo ($item->id) ? $item->id : 1; ?>">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a class="insert" href="admin-articles-delete/<?php echo ($item->id) ? $item->id : 1; ?>">
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
