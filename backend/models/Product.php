<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $photo
 * @property int $menu_id
 * @property int $menu
 * @property int $menu_title
 * @property int $type_id
 * @property string $size
 * @property string $content_ru
 * @property string $link
 * @property string $sale
 * @property string $price
 * @property int $user_id
 * @property int $shop_id
 *
 * @property MenuElement $menu0
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */	

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_ru', 'photo', 'menu_id', 'menu', 'menu_title', 'content_ru', 'price'], 'required'],
            [['menu_id', 'menu', 'menu_title','user_id', 'shop_id'], 'integer'],
            [['content_ru', 'urls'], 'string'],
            [['photo'], 'file', 'maxFiles' => 5],
            [['name_ru', 'photo', 'size', 'link', 'sale', 'price'], 'string', 'max' => 255],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => MenuElement::className(), 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Название',
            'photo' => 'Фото',
            'menu_id' => 'Элемент меню',
            'menu' => 'Меню',
            'menu_title' => 'Меню титул',
            'size' => 'Размер (обувь, одежда)',
            'content_ru' => 'Описания',
            'link' => 'Link',
            'sale' => 'Скидка',
            'price' => 'Цена (сум)',
            'user_id' => 'Ползватель ID',
            'shop_id' => 'Выберите магазин',
        ];
    }

    /**
     * Gets query for [[Menu0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu0()
    {
        return $this->hasOne(MenuElement::className(), ['id' => 'menu_id']);
    }
}
