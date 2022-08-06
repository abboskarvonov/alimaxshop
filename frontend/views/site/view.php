<?php
use yii\helpers\Html;
$lang = Yii::$app->language;
/* @var $this yii\web\View */
foreach($model as $model){
    if($lang == 'uz') {
        $namemodel =  $model->name_uz;
        $contentmodel = $model->content_uz;
    }
    if($lang == 'ru') {
        $namemodel =  $model->name_ru;
        $contentmodel = $model->content_ru;
    }
}
$this->title = $namemodel;

foreach($shop as $shop){}
?>
<style>
    .price {
        font-size: 25px;
    }
    .splide__slide img {
	width : 100%;
	height: auto;
}
</style>
<link rel="stylesheet" href="/css/splide.min.css">
<?

?>
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="row">
        <div class="col-sm-5">
            <!-- <a href="<?=$model->photo?>"><img src="<?=$model->photo?>" alt="" class="img-thumbnail"></a> -->
            <div id="image-slider" class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?
                        $photo=explode('**',trim($model->photo));
                        foreach($photo as $photo)
                        {
                            ?>
                            <li class="splide__slide">
                            <?
                                echo Yii::$app->easyImage->thumbOf($photo, [
                                    'rotate' => ['degrees' => 0],
                                    'sharpen' => 50,
                                    'background' => '#ffffff',
                                    'type' => 'jpg',
                                    'quality' => 60,
                                ], ['class' => 'img-fluid']);
                            ?>
                            </li>
                            <?
                        }
                        ?>
                        <?
                        $image=explode('**',trim($model->urls));
                        ?>
                        <?$c = count($image)?>
                        <?
                        foreach(array_slice($image, 0, $c-2) as $image)
                        {
                            ?>
                            <li class="splide__slide">
                            <?
                                echo Yii::$app->easyImage->thumbOf($image, [
                                    'rotate' => ['degrees' => 0],
                                    'sharpen' => 50,
                                    'background' => '#ffffff',
                                    'type' => 'jpg',
                                    'quality' => 60,
                                ], ['class' => 'img-fluid']);
                            ?>
                            </li>
                            <?
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-sm-7">
            <h2><?=$namemodel?></h2>
            <p class="price"><?=Yii::t('app', "Narxi")?>: <?=$model->price?></p>
            <label><?=Yii::t('app', "Mahsulot soni")?>:</label>
            <input type="text" value="1" id="qty" />
            <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $model->id])?>" data-id="<?=$model->id?>" class="btn btn-warning add-to-cart cart">
                <i class="fa fa-shopping-cart"></i>
                <?=Yii::t('app', "Savatga qo'shish")?>
            </a>
<br><br>
            <p><?=$contentmodel?></p>
<br>
            <p><i class="fa fa-home"></i> <?=$shop->name?></p>
            <p><i class="fas fa-phone-alt"></i> <?=$shop->phone?></p>
            <p><i class="fab fa-telegram-plane" aria-hidden="true"></i> <?=$shop->telegram?></p>
            <p><i class="fa fa-map-marker"></i> <?=$shop->address?></p>
            <p><i class="fa fa-envelope"></i> <?=$shop->email?></p>
            <?=$shop->map?>
        </div>
    </div>
    <div class="row">
    <?
    $lang = Yii::$app->language;
    foreach ($productshop as $productshop) {
        if($lang == 'uz'){
            $name = $productshop->name_uz;
        }
        if($lang == 'ru'){
            $name = $productshop->name_ru;
        }
        if($lang == 'en'){
            $name = $productshop->name_en;
        }
        include 'product-shop.php';
    }
    ?>
    </div>
</div>
<script src="/js/splide.min.js"></script>
<script>
document.addEventListener( 'DOMContentLoaded', function () {
	new Splide( '#image-slider', {
		'cover'      : true,
		'heightRatio': 0.9,
	} ).mount();
} );
</script>
