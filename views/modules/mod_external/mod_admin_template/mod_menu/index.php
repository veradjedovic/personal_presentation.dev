<div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="http://<?php echo SITE_ROOT; ?>/templates/admin/assets/img/user.gif" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> Joe Romlin</h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>   
            <ul id="menu" class="collapse">

                <?php                
                if(isset($data['adminMenu'])) {                  
                    foreach($data['adminMenu'] as $menu){ 
                ?>
                        <li class="panel">
                            <a href="/<?php echo ($menu->route) ? $menu->route : 'admin'; ?>/" >
                                <i class="<?php echo ($menu->icon) ? $menu->icon : ''; ?>">
                                </i> <?php echo ($menu->name) ? $menu->name : 'Admin'; ?>
                            </a>                   
                        </li>
                    
                <?php 
                    }
                } else {
                    
                ?>                     

<!--        <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
                        <i class="icon-pencil"></i> Forms
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-success">5</span>&nbsp;
                    </a>
                    <ul class="collapse" id="form-nav">
                        <li class=""><a href="forms_general.html"><i class="icon-angle-right"></i> General </a></li>
                        <li class=""><a href="forms_advance.html"><i class="icon-angle-right"></i> Advance </a></li>
                    </ul>
        </li>    -->

            </ul>   
                <?php                 
                    echo isset($data['message']) ? $data['message'] : '';             
                }
                ?> 

</div>