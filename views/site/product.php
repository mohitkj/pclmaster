<?php 
    use app\models\ProductPictures;
    use app\models\ProductRating;
?>
<div style="float:left;width:97%">
    <Div style="float:left;width:50%;height:500px;text-align: center">
        <img class="product-image-inner" src="<?php echo ProductPictures::findOne(array('product_id' => $product->product_id))['picture_location'];?>" title="<?php echo $product->product_name; ?>" id="product-collection-image-321"></a>
    </Div>
    <div style="float:left;width:50%;height: 500px;padding:10px;background: rgb(240, 255, 196);">
        <DIV style="padding-top: 25px;float: left;Z-INDEX: 10000;position: relative;font-size: 24px;color: rgb(0, 197, 255);font-family: monospace;"><?php echo ucwords( strtolower($product->product_name) ); ?></DIV>
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
        <DIV style="float:left;padding: 10px;padding-left: 0px;line-height: 26px;border-bottom: 1px solid lightcoral;"><?php echo ucfirst($product->product_description); ?></DIV>
        <DIV style="float:left;font-size: 24px;color: rgb(0, 197, 255);font-family: monospace;padding-top:10px">How To Use</DIV>
        <DIV style="float:left;padding: 10px;padding-left: 0px;line-height: 26px;border-bottom: 1px solid lightcoral;clear:both;width:100%"><?php echo ucfirst($product->how_to_use); ?></DIV>
        <DIV style="float:left;font-size: 20px;color: blueviolet;clear:both"><SPan>Price : </SPAN>₹ <?php echo $product->price; ?></DIV>
    </div>
</div>
<script src="js/site.js"></script>