<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $link
 *
 * @property MenuTitle[] $menuTitles
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    public static function dropdown()
    {
        static  $dropdown;
        if ($dropdown === null) {
            $models = static ::find()->orderBy('id')->all();

            foreach ($models as $model) {
                $dropdown[$model->id] = $model->name_ru;
            }
        }
        return $dropdown;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_uz', 'name_ru'], 'required'],
            [['name_uz', 'name_ru', 'name_en', 'link', 'img'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * Gets query for [[MenuTitles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuTitles()
    {
        return $this->hasMany(MenuTitle::className(), ['menu_id' => 'id']);
    }
}
