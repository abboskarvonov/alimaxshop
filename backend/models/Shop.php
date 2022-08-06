<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $map
 * @property string $address
 * @property string $telegram
 * @property string $email
 * @property int $user_id
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'user_id'], 'required'],
            [['map', 'address'], 'string'],
            [['user_id'], 'integer'],
            [['name', 'phone', 'telegram', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'phone' => 'Телефон',
            'map' => 'Карта',
            'address' => 'Адрес',
            'telegram' => 'Телеграм',
            'email' => 'E-mail',
            'user_id' => 'Пользователь ID',
        ];
    }
}
