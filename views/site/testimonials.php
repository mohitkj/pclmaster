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
        <div class="message-wrapper">
            <div class="message"><?php echo ucfirst(strtolower($testimonial->testimonial_content)); ?>
                <span class="author-info"><?php echo ucwords(strtolower($testimonial->testimonial_by)); ?></span>
            </div>
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
