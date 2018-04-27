<?php
/**
 * Created by PhpStorm.
 * User: didev
 * Date: 26.04.2018
 * Time: 21:43
 */

namespace app\models;


use yii\base\Model;

class testForm extends Model
{
    public $name;
    public $email;
    public $text;

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
            [['name', 'email'], 'required'/*, 'message' => 'Поле обязательно для заполнения'*/],
            ['email', 'email'],
//            ['name', 'string', 'min' => 2, 'tooShort' => 'Слишком короткое имя введите больше 2-ух символов'],
//            ['name', 'string', 'max' => 5, 'tooLong' => 'Слишком короткое имя введите меньше 5-ух символов'],
            ['name', 'string', 'length' => [2, 5], 'tooLong' => 'Слишком короткое имя введите меньше 5-ух символов'],
            ['name', 'myRule'],
            ['text', 'trim'],
        ];
    }

    public function myRule($attr)
    {
        if (!in_array($this->attrs, ['Дима', 'Dima'])){
            $this->addError($attrs,'Значение поля не в шаблоне');
        }
    }
}