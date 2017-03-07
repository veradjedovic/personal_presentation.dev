<div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="Profile Picture" width="64" height="64" src="<?php echo $_SESSION['image'] ? SITE_ROOT . '/resources/images/img_profile/' . $_SESSION['image'] : ''; ?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"><?php echo $_SESSION['name'] . "<br /> " . $_SESSION['surname']; ?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>   

    [MENU]
</div>