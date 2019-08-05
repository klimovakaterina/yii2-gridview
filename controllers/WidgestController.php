<?php


namespace app\controllers;
use yii\data\SqlDataProvider;
use yii\web\Controller;


class WidgestController  extends Controller
{

    public function actionIndex()
    {
        $provider = new SqlDataProvider([
                'sql' => 'SELECT * FROM product',
                'pagination' => [
                  'pageSize' => 10,
                ],
                'sort' => [
                    'attributes' => [
                      'id',
                    ],
                ],
                ]);

                // возвращает массив данных
               // $models = $provider->getModels();

            return $this->render('index', compact('provider'));
    }

}

/*
 *
 *
 *
 * class MyGridView extends CGridView

{

    public $nullDisplay = "something you want here...";

    // ... some codes here if you like.

}
 * */