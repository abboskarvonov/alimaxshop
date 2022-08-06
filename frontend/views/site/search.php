<?php
$lang = Yii::$app->language;
use backend\models\Slidercategory;
/* @var $this yii\web\View */

$this->title = Yii::t('app', "Qidiruv natijasi");
?>
    <div class="container-fluid" style="background-color: rgba(161, 248, 0, 0.5);">
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin-top: 10px;">
                    <h2 class="text-center text-uppercase"><?= Yii::$app->session->getFlash('error');?></h2>
                </div>
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