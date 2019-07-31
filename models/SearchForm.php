<?php
namespace app\models;

use yii\base\Model;
use app\models\Products;

class SearchForm extends Model
{
    public $id;
    public $price;
    public $hidden = array('0' => 'No', '1' => 'Yes');
    public $categoryName;

    public $minPrice;
    public $maxPrice;





    public function rules()
    {
        return [
            [['id', 'price'], 'integer'],
            ['hidden', 'integer'],
            ['categoryName', 'string'],
            [['minPrice', 'maxPrice'], 'double'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'Уникальный идентификатор:',
            'price' => 'Цена товара:',
            'hidden' => 'Видимость:',
            'categoryName' => 'Категория:',
            'minPrice' => 'Цена от:',
            'maxPrice' => 'Цена до:'
        ];
    }






}