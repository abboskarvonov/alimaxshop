<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slidercategory".
 *
 * @property int $id
 * @property string $img
 * @property int $menu_id
 * @property string $class
 */
class Slidercategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidercategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img', 'menu_id'], 'required'],
            [['menu_id'], 'integer'],
            [['img'], 'string', 'max' => 255],
            [['class'], 'string', 'max' => 20],
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
            'class' => 'Class',
        ];
    }
}
