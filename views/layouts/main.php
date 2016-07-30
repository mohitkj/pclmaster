<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <script src="js/jquery-3.1.0.min.js"></script>        
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">         
            <div class="top-header">
                <div class="social-media-container">
                    <div class="empty-div"></DIV>
                    <div class="social-media">
                        <a href="https://www.facebook.com/" title="Find us On Facebook" class="facebook-icon" target="_blank"></a> 
                        <a href="https://twitter.com/" title="Find us On Twitter" class="twitter-icon" target="_blank"></a> 
                        <a href="http://www.youtube.com/" title="Find us On Youtube" class="you-tube-icon" target="_blank"></a> 
                        <a href="javascript:void(0)" title="" class="call-icon" target="_blank"></a> 
                        <div class="call-us">Call:+91-9711100337</div>
                        <div class="call-us" style="display:none">Call:+91-9810880657</div>
                        <div class="call-us" style="display:none">Call:+91-9711482445</div>
                    </div>
                    <div class="book-appointment"><a href="javascript:void(0);" >BOOK AN APPOINTMENT</a> </div>
                </div>
                <div class="nav-container">
                    <UL class="navbar-1">                    
                        <LI>
                            <a href="?r=site">HOME</A>
                        </LI>
                        <LI>
                            <A>ABOUT US</A>
                        </LI>
                        <LI id="bm">
                            <A>BEAUTY MANAGEMENT &#9662;</A>
                            <UL class="navbar-internal" id='nav-bm' style="display:none">
                                <LI>
                                    <A href='?r=site/listing&category=Body%20Care'><span style="font-size:8px">&#x29FD;</span> Body Care Treatment</A>
                                </LI>
                                <LI>
                                    <A href='?r=site/listing&category=Skin%20Care'><span style="font-size:8px">&#x29FD;</span> Skin Care Treatment</A>
                                </LI>
                                <LI>
                                    <A href='?r=site/listing&category=Hair%20Care'><span style="font-size:8px">&#x29FD;</span> Hair Care Treatment</A>
                                </LI>
                            </UL>
                        </LI>
                        <LI>
                            <a>WHATS NEW</A>
                        </LI>
                        <LI>
                            <a>TESTIMONIALS</A>
                        </LI>
                        <LI>
                            <a>CONTACT US</A>
                        </LI>
                    </UL>
                </DIV>
            </DIV>
            <?php
            if( isset($this->params['page_title'])){?>
                <header class="page-title">
                    <h2 style="color: rgba(0, 0, 0, .7);font-size: 28px"><?php echo $this->params['page_title'];?></h2>
                </header>
            <?php }
                echo Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]);
            ?>
            <div class="container">               
                <?= $content ?>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Anjali's Herbavedics  <?= date('Y') ?></p>

                <p class="pull-right"></p>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>