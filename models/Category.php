<?php

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'Categories';
    }


    /** Создаём связь один ко многим с таблицей products
     * имя метода - это наименование поля которое добавляется в модель Category для обращения к нему. */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['parent' => 'id']);
    }
}