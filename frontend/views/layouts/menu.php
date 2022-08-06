<?
use cinghie\multilanguage\widgets\MultiLanguageWidget;
use backend\models\Menu;
use backend\models\MenuTitle;
use backend\models\MenuElement;
$menu = Menu::find()->all();
?>  
    <div class="container-fluid main-header">
        <div class="container-fluid" style="padding: 0;">
            <nav class="navbar navbar-expand-sm navbar-light" style="flex-wrap: wrap;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto" style="flex-wrap: wrap;">
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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 13px; color: #fff;">
                                <?=$name?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="row">
                                    <?
                                    $menusub = MenuTitle::find()->where(['menu_id' => $menu->id])->all();
                                    foreach ($menusub as $menusub) {
                                        if($lang == 'uz'){
                                            $namesub = $menusub->name_uz;
                                        }
                                        if($lang == 'ru'){
                                            $namesub = $menusub->name_ru;
                                        }
                                        if($lang == 'en'){
                                            $namesub = $menusub->name_en;
                                        }
                                    ?>
                                    <div class="col">
                                        <h4 class="menu-heading"><a href="<?=\yii\helpers\Url::to(['site/category', 'link' => $menusub->link])?>"><?=$namesub?></a></h4>
                                        <?
                                        $menuelem = MenuElement::find()->where(['menu_title_id' => $menusub->id])->all();
                                        foreach($menuelem as $menuelem) {
                                            if($lang == 'uz'){
                                                $nemaelem = $menuelem->name_uz;
                                            }
                                            if($lang == 'ru'){
                                                $nemaelem = $menuelem->name_ru;
                                            }
                                            if($lang == 'en'){
                                                $nemaelem = $menuelem->name_en;
                                            }
                                        ?>
                                        <a class="dropdown-item" href="<?=\yii\helpers\Url::to(['site/categoryview', 'link' => $menuelem->link])?>"><?=$nemaelem?></a>
                                        <?
                                        }
                                        ?>
                                    </div>
                                    <?
                                    }
                                    ?>
                                </div>
                            </div>
                        </li>
                    <?
                    }
                    ?>
                        
                    </ul>
                </div>
            </nav>
        </div>
    </div>