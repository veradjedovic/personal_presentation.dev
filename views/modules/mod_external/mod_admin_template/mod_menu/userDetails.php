<div class="media user-media well-small">
                <a class="user-link" href="<?php echo SITE_ROOT . '/admin/'; ?>">
                    <img class="media-object img-thumbnail user-img" alt="Profile Picture" width="64" height="64" src="<?php echo $data['detailOfUser']->image ? SITE_ROOT . '/resources/images/img_profile/' . replace($data['detailOfUser']->image) : ''; ?>" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"><?php echo ($data['detailOfUser']->name ? replace($data['detailOfUser']->name) : 'Admin') . "<br /> " . ($data['detailOfUser']->surname ? replace($data['detailOfUser']->surname) : ''); ?></h5>
                </div>
                <br />
</div>   
