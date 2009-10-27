<?php

use app\models\ProductPictures;

foreach ($products as $index => $product) {
    if ($index == 0) {
        $display = '';
    } else {
        $display = 'none';
    }
    ?>
    <DIV class="front-page-image" style="background:<?php echo $product->front_page_background_color; ?>;display:<?php echo $display; ?>">
        <A href="?r=site/product&product_id=<?php echo $product->product_id; ?>" > 
            <img src="<?php echo ProductPictures::findOne(array('product_id' => $product->product_id))['picture_location']; ?>" title="<?php echo $product->product_name; ?>"/>
        </A>
    </DIV>
<?php }
?>
<DIV class='front-page-image-text' >
    <?php
    foreach ($products as $index => $product) {
        if ($index == 0) {
            $activeClass = 'active-image';
        } else {
            $activeClass = '';
        }
        ?>       
        <DIV class="image-text <?php echo $activeClass; ?>" onclick='showImageClick(<?php echo $index; ?>)' style="width:<?php echo 100 / count($products); ?>%"><?php echo ucfirst(strtolower($product->product_name)); ?></DIV>
        <?php } ?>
</DIV>
<script src="js/site.js"></script>

