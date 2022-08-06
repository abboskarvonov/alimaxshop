<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use backend\models\Menu;
use backend\models\MenuTitle;
use backend\models\MenuElement;
use cinghie\multilanguage\widgets\MultiLanguageWidget;
use yii\bootstrap4\Modal;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/splide.min.css">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GDEMFN6BT0"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GDEMFN6BT0');
    </script>
    <style>
        .splide__slide img {
            width : 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <?php $this->beginBody() ?>
    <div class="container-fluid main-header">
        <div class="container header">
            <div class="row" style="align-items: center;">
                <div class="col-md-6" style="display: flex; justify-content: space-between">
                    <h3><a href="<?=\yii\helpers\Url::to(['site/index'])?>" style="color: #fff;"><i class="fa fa-home"></i></a></h3>
                    <h3 class="logo">Alimaxshop</h3>
                    <?
                        Modal::begin([
                            'title' => '<h2>'.Yii::t("app", "Qidiruv").'</h2>',
                            'size' => 'modal-lg', 
                            
                            'toggleButton' => ['label' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-warning'],
                        ]);
                        ?>
                        <form action="<?=\yii\helpers\Url::to(['site/search'])?>" method="GET">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="<?=Yii::t('app', "Mahsulot nomi")?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="pricestart" placeholder="<?=Yii::t('app', "Minimal narx")?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="priceend" placeholder="<?=Yii::t('app', "Maksimal narx")?>">
                            </div>
                            <button type="submit" class="btn btn-success btn-block btn-lg"><i class="fa fa-search"></i></button>
                        </form>
                        <?
                        Modal::end();
                    ?>
                </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-2 col-5">
                    <nav class="nav justify-content-start">
                        <?= MultiLanguageWidget::widget([
                            'widget_type' => 'classic', // classic or selector
                            'image_type'  => 'rounded', // classic or rounded
                            'width'       => '25',
                            'addCurrentLang' => true, // add current lang
                            'calling_controller' => $this->context,
                            ]); 
                        ?>
                    </nav>
                </div>
                <div class="col-md-2 col-7">
                    <nav class="nav justify-content-end icon-button">
                        <li class="nav-item">
                            <a class="nav-link text-warning" onclick="return getCart()" href="#"><i
                                    class="fas fa-shopping-cart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="<?=\yii\helpers\Url::to(['site/signup'])?>"><i class="fas fa-user-plus"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="/admin"><i class="fas fa-sign-in-alt"></i></a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <?
    include 'menu.php';
    ?>
    <?=$content?>
    <div class="container-fluid white-bg footer">
        <div class="container">
            <div class="row">
                <div class="col-md col-4">
                    <?
                    $lang = Yii::$app->language;
                    $menu1 = Menu::find()->orderBy(['id' => SORT_DESC])->limit(3)->all();
                    ?>
                    <p class="footer-title"><?=Yii::t('app', "Menu")?></p>
                    <ul class="nav flex-column">
                        <?
                        foreach($menu1 as $menu1){
                            if($lang == 'uz'){
                                $namemenu1 = $menu1->name_uz;
                            }
                            if($lang == 'ru'){
                                $namemenu1 = $menu1->name_ru;
                            }
                        ?>
                        <li>
                            <a href="<?=\yii\helpers\Url::to(['site/categoryview', 'link' => $menu1->link])?>"><?=$namemenu1?></a>
                        </li>
                        <?
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md col-4">
                    <?
                    $lang = Yii::$app->language;
                    $menu2 = Menu::find()->orderBy(['id' => SORT_DESC])->offset(3)->limit(3)->all();
                    ?>
                    <p class="footer-title"><?=Yii::t('app', "Menu")?></p>
                    <ul class="nav flex-column">
                        <?
                        foreach($menu2 as $menu2){
                            if($lang == 'uz'){
                                $namemenu2 = $menu2->name_uz;
                            }
                            if($lang == 'ru'){
                                $namemenu2 = $menu2->name_ru;
                            }
                        ?>
                        <li>
                            <a href="<?=\yii\helpers\Url::to(['site/categoryview', 'link' => $menu2->link])?>"><?=$namemenu2?></a>
                        </li>
                        <?
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md col-4">
                    <?
                    $lang = Yii::$app->language;
                    $menu3 = Menu::find()->orderBy(['id' => SORT_DESC])->offset(6)->limit(3)->all();
                    ?>
                    <p class="footer-title"><?=Yii::t('app', "Menu")?></p>
                    <ul class="nav flex-column">
                        <?
                        foreach($menu3 as $menu3){
                            if($lang == 'uz'){
                                $namemenu3 = $menu3->name_uz;
                            }
                            if($lang == 'ru'){
                                $namemenu3 = $menu3->name_ru;
                            }
                        ?>
                        <li>
                            <a href="<?=\yii\helpers\Url::to(['site/categoryview', 'link' => $menu3->link])?>"><?=$namemenu3?></a>
                        </li>
                        <?
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md col-6">
                    <p class="footer-title"><?=Yii::t('app', 'Ijtimoiy tarmoqlar')?></p>
                    <ul class="nav flex-column">
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-telegram-plane"></i> Telegram</a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid white-bg footer-end">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <p>© 2020-<?=date('Y')?> Alimaxshop</p>
                </div>
                <div class="col-sm-7">
                    <p>info@alimaxshop.com</p>
                    <p>+998-33-313-5757</p>
                    <p>+998-33-977-7701</p>
                    <p>+998-33-719-9998</p>
                </div>
                <div class="col-sm-2">
                    <i class="fas fa-credit-card"></i>
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
        </div>
    </div>
    <?php 
    
    Modal::begin([
        'title' => '<h2 align="center">Корзина</h2>',
        'id' => 'cart',
        'size' => 'modal-lg', 
        'footer' => '
        <button type="button" class="btn btn-default" data-dismiss="modal">Добавить товар</button>
        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформить заказ</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
        ',
    ]);

    Modal::end();

    ?>
    <script src="/js/splide.min.js"></script>
    <script>
    document.addEventListener( 'DOMContentLoaded', function () {
        new Splide( '#image-slider', {
            'cover'      : true,
            'heightRatio': 0.9,
        } ).mount();
    } );
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>