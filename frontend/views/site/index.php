<?php

/* @var $this yii\web\View */
use backend\models\Menu;
use backend\models\Sliderindex;
$slider = Sliderindex::find()->all();
$menu = Menu::find()->all();
$menucat = Menu::find()->all();
$this->title = 'Alimaxshop';
?>
    <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px; background: linear-gradient(to right, #cb11ab 0, #481173 100%) no-repeat;
    background: -webkit-gradient(linear, left top, right top, from(#cb11ab, #481173)) no-repeat;">
        <div class="container" style="padding:0;">
            <div class="row">
                <div class="col-md-3">
                    <ul class="nav flex-column ver-menu">
                    <?
                        $lang = Yii::$app->language;
                        foreach($menu as $menu) {
                            if($lang == 'uz'){
                                $name = $menu->name_uz;
                            }
                            if($lang == 'ru'){
                                $name = $menu->name_ru;
                            }
                            if($lang == 'en'){
                                $name = $menu->name_en;
                            }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link active" style="font-size: 13px;" href="<?=\yii\helpers\Url::to(['site/categoryall', 'link' => $menu->link])?>"><?=$name?></a>
                        </li>
                        <?
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-12" style="padding: 0px;">
                    <div id="my-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?
                            foreach($slider as $slider){
                            ?>
                            <div class="carousel-item <?=$slider->class?>">
                                <img class="d-block w-100" src="<?=$slider->img?>" alt="">
                            </div>
                            <?
                            }
                            ?>
                            

                        </div>
                        <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #eee;">
        <div class="container">
            <div class="row">
                <?
                foreach($menucat as $menucat){
                    if($lang == 'uz'){
                        $namecat = $menucat->name_uz;
                    }
                    if($lang == 'ru'){
                        $namecat = $menucat->name_ru;
                    }
                    if($lang == 'en'){
                        $namecat = $menucat->name_en;
                    }
                ?>
                <div class="col-md-2 col-sm-3 col-4 category-circle">
                    <a href="<?=\yii\helpers\Url::to(['site/categoryall', 'link' => $menucat->link])?>"><img src="/<?=$menucat->img?>" alt=""></a>
                    <p class="text-center"><?=$namecat?></p>
                </div>
                <?
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: rgba(161, 248, 0, 0.5);">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center" style="margin-top: 10px;">
                    <h1 class="title-text"><?=Yii::t('app', "Yangi mahsulotlar")?></h1>
                </div>
                <!--<div class="col-2 d-flex align-items-center justify-content-end" style="margin-top: 10px;">-->
                <!--    <a href="#" class="btn btn-primary"><?=Yii::t('app', "Barchasi")?></a>-->
                <!--</div>-->
                <?
                $lang = Yii::$app->language;
                foreach ($product as $product) {
                    if($lang == 'uz'){
                        $name = $product->name_uz;
                    }
                    if($lang == 'ru'){
                        $name = $product->name_ru;
                    }
                    if($lang == 'en'){
                        $name = $product->name_en;
                    }
                    include 'product.php';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background: rgba(29, 53, 192, 0.3)">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center" style="margin-top: 10px;">
                    <h1 class="title-text"><?=Yii::t('app', "Mahsulotlar")?></h1>
                </div>
                <!--<div class="col-2 d-flex align-items-center justify-content-end" style="margin-top: 10px;">-->
                <!--    <a href="#" class="btn btn-danger"><?=Yii::t('app', "Barchasi")?></a>-->
                <!--</div>-->
                <?
                $lang = Yii::$app->language;
                foreach ($product1 as $product) {
                    if($lang == 'uz'){
                        $name = $product->name_uz;
                    }
                    if($lang == 'ru'){
                        $name = $product->name_ru;
                    }
                    if($lang == 'en'){
                        $name = $product->name_en;
                    }
                    include 'product.php';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid red-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center" style="margin-top: 10px;">
                    <h1 class="title-text" style="color: #fff;"><?=Yii::t('app', "Chegirma")?></h1>
                </div>
                <!--<div class="col-2 d-flex align-items-center justify-content-end" style="margin-top: 10px;">-->
                <!--    <a href="#" class="btn btn-primary"><?=Yii::t('app', "Barchasi")?></a>-->
                <!--</div>-->
                <?
                $lang = Yii::$app->language;
                foreach ($sale as $product) {
                    if($lang == 'uz'){
                        $name = $product->name_uz;
                    }
                    if($lang == 'ru'){
                        $name = $product->name_ru;
                    }
                    if($lang == 'en'){
                        $name = $product->name_en;
                    }
                    include 'product.php';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: rgba(161, 248, 0, 0.5);">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center" style="margin-top: 10px;">
                    <h1 class="title-text"><?=Yii::t('app', "Mahsulotlar")?></h1>
                </div>
                <!--<div class="col-2 d-flex align-items-center justify-content-end" style="margin-top: 10px;">-->
                <!--    <a href="#" class="btn btn-warning"><?=Yii::t('app', "Barchasi")?></a>-->
                <!--</div>-->
                <?
                $lang = Yii::$app->language;
                foreach ($product2 as $product) {
                    if($lang == 'uz'){
                        $name = $product->name_uz;
                    }
                    if($lang == 'ru'){
                        $name = $product->name_ru;
                    }
                    if($lang == 'en'){
                        $name = $product->name_en;
                    }
                    include 'product.php';
                }
                ?>
            </div>
        </div>
    </div>