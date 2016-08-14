<DIV style="background:#DDDDDD;float:left;width:100%;border-top:1px solid grey;padding-top: 10px">
    <DIV style="padding-left:5px;color:rgb(135, 135, 135);"><H3>Testimonials</H3><SPAN style="float: right;margin-top: -55px;padding-right: 10px;cursor: pointer;"><A href='?r=site/testimonials' class="testimonial-view-all">View All</A></SPAN></DIV>
    <?php
    foreach ($testimonials as $index => $testimonial) {
        if ($index == 0) {
            $display = '';
        } else {
            $display = 'none';
        }
        ?>
        <DIV class="front-page-testimonial" style="padding:10px;width:100%;float:left;display:<?php echo $display; ?>">
            <?php if ($index % 2 == 0) { ?>
                <DIV style="float:left;WIDTH:100px">
                    <img style="border-radius: 50%;WIDTH:100px" src="<?php echo $testimonial->pic_location ?>">
                </DIV>
            <?php } ?>
            <DIV style="float:left;width:85%;padding-left: 15px;color:rgb(135, 135, 135);">
                <?php echo ucfirst(strtolower($testimonial->testimonial_content)); ?>
            </DIV>
            <?php if ($index % 2 != 0) { ?>
                <DIV style="float:left;WIDTH:100px">
                    <img style="border-radius: 50%;WIDTH:100px" src="<?php echo $testimonial->pic_location ?>">
                </DIV>
            <?php } ?>
            <DIV style="text-align:<?php echo ( $index % 2 == 0 ? 'right' : 'left'); ?>;clear:both"><span class="author-info" style="color:rgb(135, 135, 135);font-weight: bold"><?php echo ucwords(strtolower($testimonial->testimonial_by)); ?></span></DIV>
        </DIV>
    <?php } ?>
</DIV>