                <div class="col-lg-2 col-md-3 col-6">
                    <div class="product">
                        <a href="<?=\yii\helpers\Url::to(['site/view', 'link' => $productshop->link])?>"><div class="product-img">
                            <?
                                echo Yii::$app->easyImage->thumbOf($productshop->photo, [
                                    'rotate' => ['degrees' => 0],
                                    'sharpen' => 50,
                                    'background' => '#ffffff',
                                    'type' => 'jpg',
                                    'quality' => 60,
                                ], ['class' => 'img-fluid']);
                            ?>
                        </div></a>
                        <div class="product-content">
                            <div class="row">
                            <div class="col-12">
                                    <a class="product-view text-center" href="<?=\yii\helpers\Url::to(['site/view', 'link' => $productshop->link])?>"><p class="product-title"><?=$name?></p></a>
                                    <a class="product-view text-center" href="<?=\yii\helpers\Url::to(['site/view', 'link' => $productshop->link])?>"><p class="price"><?=$productshop->price?></p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>