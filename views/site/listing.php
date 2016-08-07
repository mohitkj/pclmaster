<?php 
    use yii\widgets\LinkPager;
    use app\models\ProductPictures;
    use app\models\ProductRating;
?>
<ol class="products-list" id="products-list">
    <?php foreach ($products as $index => $product) { ?>
        <li class="item row type-2 quick-view-container odd">
            <div class="quick-view-data-container"></div>
            <div class="col-sm-4">
                <div class="image-box">
                    <div class="product-labels-wrapper clearfix top label-type-2">
                    </div>			
                    <a href="?r=site/product&product_id=<?php echo $product->product_id;?>" title="" class="product-image">
                        <img class="product-image" src="<?php echo ProductPictures::findOne(array('product_id' => $product->product_id))['picture_location'];?>" title="<?php echo $product->product_name; ?>" id="product-collection-image-321"></a>
                </div>
            </div>
            <div class="col-sm-8" style="background: rgb(240, 255, 196);">
                <div class="product-shop">
                    <div class="f-fix">
                        <h2 class="product-name"><a href="?r=site/product&product_id=<?php echo $product->product_id;?>" title="<?php echo $product->product_name; ?>"><?php echo ucwords(strtolower($product->product_name)); ?></a></h2>
                        <DIV style="float:left;clear:both"><?php 
        
                        $ratingData = ProductRating::find()->where(array('product_id' => $product->product_id))->all();
                        $rating = 0;
                        foreach( $ratingData as $index => $ratingObj ){
                            $rating+= $ratingObj->rating;
                        }
                        if( !empty(count($ratingData))){
                            $rating = $rating/count($ratingData);
                        }
                        $rating = $rating == 0 ? 5 : round($rating);        
                        for( $i=0;$i<$rating;$i++){?>
                            <img style="float:left" src="rating.png" />
                        <?php } ?>
                        </DIV>
                        <div class="desc std" style="clear:both;padding-top:10px">
                            <?php echo substr(ucfirst($product->product_description), 0, 200); ?>&nbsp;<a href="?r=site/product&product_id=<?php echo $product->product_id;?>" title="<?php echo $product->product_name; ?>" class="learn-more">Learn More</a>
                        </div>
                        <div class="review-price-block">
                            <div class="price-box">
                                <span class="regular-price" id="product-price-<?php echo $product->product_id; ?>">
                                    <span class="price"><SPan>Price : </SPAN>₹ <?php echo $product->price; ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="product-buttons">
                            <a style="color: #f66d52" class="btn btn-default btn-read-more" href="?r=site/product&product_id=<?php echo $product->product_id;?>" title="Read More">Read More</a>
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
<style>
.btn-read-more:hover,.btn-default:hover{
    color:#73B0D0 !important
}    
</style>