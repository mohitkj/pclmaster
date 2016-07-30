<?php 
    use yii\widgets\LinkPager;
?>
<ol class="products-list" id="products-list">
    <?php foreach ($products as $index => $product) { ?>
        <li class="item row type-2 quick-view-container odd">
            <div class="quick-view-data-container"></div>
            <div class="col-sm-4">
                <div class="image-box">
                    <div class="product-labels-wrapper clearfix top label-type-2">
                    </div>			
                    <a href="#" title="" class="product-image">
                        <img src="#" title="<?php echo $product->product_name; ?>" id="product-collection-image-321">			</a>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="product-shop">
                    <div class="f-fix">
                        <h2 class="product-name"><a href="#" title="<?php echo $product->product_name; ?>"><?php echo ucwords(strtolower($product->product_name)); ?></a></h2>
                        <div class="desc std">
                            <?php echo substr(ucfirst($product->product_description), 0, 200); ?>&nbsp;<a href="#" title="<?php echo $product->product_name; ?>" class="learn-more">Learn More</a>
                        </div>
                        <div class="review-price-block">
                            <div class="price-box">
                                <span class="regular-price" id="product-price-<?php echo $product->product_id; ?>">
                                    <span class="price">Rs<?php echo $product->price; ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="product-buttons">
                            <a class="btn btn-default" href="#" title="Read More">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </li>
    <?php } ?>
</ol>
<?php
// display pagination
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
<script src="js/site.js"></script>