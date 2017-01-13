<!--<li class="current" id="active"><a id="current" href="naslovna/1">Home</a></li>
<li><a href="page/ourworks/2">Our Work</a></li>
<li><a href="page/testimonials/3">Testimonials</a></li>
<li><a href="page/projects/4">Projects</a></li>
<li><a href="page/contact/5">Contact Us</a></li>-->

<?php

foreach($data['pages'] as $item){

    echo "<li><a href='{$item->route}/{$item->id}'>$item->name</a></li>";
}
