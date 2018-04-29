<?php
/**

 */

namespace app\models;

use yii\db\ActiveRecord;

class testForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст сообщения',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'text'], 'required'],
//            ['email', 'email'],
//            ['email', 'safe'],
            ['email', 'trim'],
        ];
    }
}