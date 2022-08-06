<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu_title".
 *
 * @property int $id
 * @property string $name_uz
 * @property string $name_ru
 * @property string $name_en
 * @property string $link
 * @property int $menu_id
 *
 * @property MenuElement[] $menuElements
 * @property Menu $menu
 */
class MenuTitle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu_title';
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
            [['name_uz', 'name_ru', 'menu_id'], 'required'],
            [['menu_id'], 'integer'],
            [['name_uz', 'name_ru', 'name_en', 'link'], 'string', 'max' => 255],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'id']],
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
            'menu_id' => 'Меню ID',
        ];
    }

    /**
     * Gets query for [[MenuElements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenuElements()
    {
        return $this->hasMany(MenuElement::className(), ['menu_title_id' => 'id']);
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }
}
