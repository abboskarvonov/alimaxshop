<?php
$lang = Yii::$app->language;
use backend\models\Slider;
/* @var $this yii\web\View */
foreach ($menuelement as $menuelement) {
    if($lang == 'uz'){
        $title = $menuelement->name_uz;
    }
    if($lang == 'ru'){
        $title = $menuelement->name_ru;
    }
}
$slider = Slider::find()->where(['menu_element_id' => $menuelement->id])->all();
$this->title = $title;
?>

    <div class="container-fluid" style="padding-top: 20px; padding-bottom: 20px; background: rgba(255, 225, 158, 1);">
        <div class="container" style="padding: 0;">
            <div class="row">
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
    <div class="container-fluid" style="background-color: rgba(161, 248, 0, 0.5);">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center" style="margin-top: 10px;">
                    <h1 class="title-text"><?=$title?></h1>
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