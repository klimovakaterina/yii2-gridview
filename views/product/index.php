<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = "Список продутов";


// форматтер номера
echo "<h4>Форматер номера</h4>";
$number = '+3752598624';
$format = "+7 (XXX) XX-XX-XXX";
echo Yii::$app->formatterPhone->changeFormat($number, $format);




// форма поиска
echo $this->render('_search', ['model' => $model, 'category'=>$category, 'idProductList' => $idProductList, 'categoryList' => $categoryList , 'products' => $products]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $products,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        [
            'label' => 'Отображаемые',
            'attribute' => 'hidden',
            'format'=>'boolean',
        ],
        [
            'label' => 'Категория',
            'attribute' => 'categoryName',
            'format' => 'text',
        ],
        [
            'label' => 'Цена',
            'attribute' => 'price',
        ],

    ],
]);

