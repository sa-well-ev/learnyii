<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 28.04.2018
 * Time: 21:34
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    /** Создаём связь один к одному с таблицей categories */
    public function getProducts()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }
}