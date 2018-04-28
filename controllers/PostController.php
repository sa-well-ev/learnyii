<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 14.03.2016
 * Time: 21:17
 */

namespace app\controllers;
use app\models\Category;
use Yii;
use app\models\TestForm;


class PostController extends AppController
{

    public $layout = 'basic';

    public function beforeAction($action){
        if( $action->id == 'index' ){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex(){
        if( Yii::$app->request->isAjax ){
            debug(Yii::$app->request->post());
            return 'test';
        }

        $model = new TestForm();

        if  ($model->load(Yii::$app->request->post())){
/*            debug(Yii::$app->request->post());
            debug($model);
            die;*/
            if ($model->validate()){
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error', 'Данные не приняты по причине ошибки');
            }
        }
        $this->view->title = 'Все статьи';
        return $this->render('test', compact('model'));
    }

    public function actionShow(){
        $this->view->title = 'Одна статья!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);

//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id' => SORT_ASC])->all();
//        $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
//        $cats = Category::find()->asArray()->all();
//        $cats = Category::find()->asArray()->where('parent=691')->all();
//        $cats = Category::find()->asArray()->where(['parent' => 691])->all();
//        $cats = Category::find()->asArray()->where(['like', 'title', 'pp'])->all();
//        $cats = Category::find()->asArray()->where(['<=', 'id', 695])->all();
//        $cats = Category::find()->asArray()->where('parent=691')->limit(1)->all();
//        $cats = Category::find()->asArray()->where('parent=691')->one(); //одномерный массив
//        $cats = Category::find()->asArray()->where('parent=691')->limit(1)->one(); //одномерный массив без избыточности в запросе
//        $cats = Category::find()->asArray()->where('parent=691')->count();
//        $cats = Category::find()->asArray()->count();
//        $cats = Category::findOne(['parent' => 691]);
//        $cats = Category::findAll(['parent' => 691]);
//        $query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
//        $cats = Category::findBySql($query)->all();
        //Защита от SQL инъекций
//        $query = "SELECT * FROM categories WHERE title LIKE :search";
//        $cats = Category::findBySql($query, [':search' => '%pp%'])->all();

         //ленивая загрузка (только при обращении к методу в связанной таблице)
//        $cats = Category::findOne(694);

        //жадная загрузка (with() - метод) - выборка сразу всех данных
//        $cats = Category::find()->with('products')->where('id=694')->all();

//        $cats = Category::find()->all();
        $cats = Category::find()->with('products')->all();

        return $this->render('show', compact('cats'));
    }

} 