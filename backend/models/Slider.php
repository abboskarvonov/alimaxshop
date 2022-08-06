<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $img
 * @property int $menu_id
 * @property int $menu_title_id
 * @property int $menu_element_id
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
            [['img', 'class', 'menu_id', 'menu_title_id', 'menu_element_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Фото',
            'menu_id' => 'ID Меню',
            'menu_title_id' => 'ID титул меню',
            'menu_element_id' => 'ID элемент меню',
        ];
    }
}
