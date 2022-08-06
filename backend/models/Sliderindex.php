<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sliderindex".
 *
 * @property int $id
 * @property string $img
 * @property string $class
 */
class Sliderindex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sliderindex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
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
            'class' => 'Class',
        ];
    }
}
