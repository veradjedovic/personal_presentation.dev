            <ul id="menu" class="collapse">

                <?php                
                if(isset($data['adminMenu'])) {                  
                    foreach($data['adminMenu'] as $menu){ 
                ?>
                        <li class="panel">
                            <a href="<?php echo SITE_ROOT . '/' . (($menu->route) ? $menu->route : 'admin') . '/'; ?>" >
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
            