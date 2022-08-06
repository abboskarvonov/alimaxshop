<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu_element".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $link
 * @property int $menu_title_id
 *
 * @property MenuTitle $menuTitle
 * @property Product[] $products
 */
class MenuElement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_element';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru', 'menu_id', 'menu_title_id'], 'required'],
            [['menu_title_id'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'link'], 'string', 'max' => 255],
            [['menu_title_id'], 'exist', 'skipOnError' => true, 'targetClass' => MenuTitle::className(), 'targetAttribute' => ['menu_title_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_uz' => 'Название Uz',
            'name_ru' => 'Название Ru',
            'name_en' => 'Название En',
            'link' => 'Link',
            'menu_title_id' => 'ID Меню титул',
        ];
    }

    /**
     * Gets query for [[MenuTitle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuTitle()
    {
        return $this->hasOne(MenuTitle::className(), ['id' => 'menu_title_id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['menu_id' => 'id']);
    }
}
