<?php

use yii\widgets\LinkPager;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
foreach ($testimonials as $testimonial) {
    ?>

    <div class="content-wrapper">
        <div style="float:left" class="message-wrapper">
            <div style="float:left"><img style="border-radius: 50%;WIDTH:100px" src="<?php echo $testimonial->pic_location;?>"></img></div>
            <div style="float:left;width:90%;padding-left: 15px;" class="message"><?php echo ucfirst(strtolower($testimonial->testimonial_content)); ?>                
            </div>
            <DIV style="text-align:right;clear:both"><span class="author-info"><?php echo ucwords(strtolower($testimonial->testimonial_by)); ?></span></DIV>
        </div>
    </div>
<?php } ?>
<?php
// display pagination
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
<script src="js/site.js"></script>
