<?php


namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\Products;
use app\models\SearchForm;



class ProductController extends Controller
{

    public function actionIndex()
    {

        $products = new Products();
        $dataProvider = $products->search(Yii::$app->request->get());
        $idProductList = $products->getData('id');
        $categoryList = $products->getData('categoryName');
        $model = new SearchForm();
        return $this->render('index', compact('dataProvider','products', 'model', 'categoryList', 'idProductList'));

    }



}
