<?php
/**

 */

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget
{
    public $name;

    public function init()
    {
        parent::init();
//        if ($this->name === null) $this->name = 'Гость';

        //Буфирезация всего вывода виджета
        ob_start();
    }

    public function run()
    {
//        return "<h1>{$this->name}, Привет Руккола!</h1>";
//        return $this->render('my');
//        return $this->render('my', ['name' => $this->name]);
        $content = ob_get_clean();
        $content = mb_strtoupper($content , 'utf-8');
        return $this->render('my', compact('content'));
    }
}