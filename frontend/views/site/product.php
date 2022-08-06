                <div class="col-lg-2 col-md-3 col-6" style="padding-left: 3px; padding-right: 3px;">
                    <div class="product">
                        <a href="<?=\yii\helpers\Url::to(['site/view', 'link' => $product->link])?>"><div class="product-img">
                            <?
                                echo Yii::$app->easyImage->thumbOf($product->photo, [
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
                                    <a class="product-view text-center" href="<?=\yii\helpers\Url::to(['site/view', 'link' => $product->link])?>"><p class="product-title"><?=$name?></p></a>
                                    <a class="product-view text-center" href="<?=\yii\helpers\Url::to(['site/view', 'link' => $product->link])?>"><p class="price"><?=$product->price?> </p></a>
                                </div>
                                <!-- <div class="col product-icon">
                                    <a class="add-to-cart text-warning" href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?=$product->id?>"><i class="fas fa-cart-plus"></i></a>
                                    <a class="text-warning" href="<?=\yii\helpers\Url::to(['site/view', 'link' => $product->link])?>"><i class="fas fa-arrow-right"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>