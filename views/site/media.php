<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$media = array(
    'media/media1.jpg',
    'media/media2.jpg',
    'media/media3.jpg',
    'media/media4.jpg',
    'media/media5.jpg',
    'media/media6.jpg',
    'media/media7.jpg',
    'media/media8.jpg',
    'media/media9.jpg',
    'media/media10.jpg',
    'media/media11.jpg',
    'media/media12.jpg',
    'media/media13.jpg',
    'media/media14.jpg',
);
?>
<DIV style="width:100%;text-align: center;float:left">
    <IMG id= 'media-main' src="media/media1.jpg" style="margin-left:10%;float:left;width:80%;height:500px">
    <DIV class="btn btn-default btn-read-more" style="Width:8%;margin-left:1%;text-align: center;float:left;position: relative;margin-top:20px;padding-right:7px;padding-top:10px;" onclick='pauseMedia(this)'>Pause</DIV>
</DIV>
<DIV style="float:left;overflow: hidden;width: 5024px;">
    <?php
    foreach ($media as $index => $med) {
        if ($index == 0) {
            $class = 'active-media';
        } else {
            $class = '';
        }
        ?>
        <div class='media-image <?php echo $class; ?>'  style="float:left;opacity:0.4;padding:5px;margin:5px;cursor: pointer" onclick="showMedia(<?php echo $index ?>)">
            <img style="width:170px;height:75px;" src='<?php echo $med ?>'>
        </div>
    <?php } ?>
</div>
<?php echo $this->render('bottomtestimonials', array('testimonials' => $testimonials)); ?>
<script src="js/site.js"></script>