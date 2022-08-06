<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slidersubcategory".
 *
 * @property int $id
 * @property string $img
 * @property int $menu_id
 * @property int $menu_title_id
 * @property string $class
 */
class Slidersubcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidersubcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'menu_id', 'menu_title_id'], 'required'],
            [['menu_id', 'menu_title_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['class'], 'string', 'max' => 50],
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
            'menu_id' => 'ID меню',
            'menu_title_id' => 'ID титул меню',
            'class' => 'Class',
        ];
    }
}
