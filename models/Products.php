<?php


namespace app\models;


use yii\data\ArrayDataProvider;
use Yii;

class Products
{

    protected $pathToFile;
    public  $categories;
    public $products;


    public $filterData = array(
        'id' => '',
        'hidden' => '',
        'minPrice' => '',
        'maxPrice' => '',
        'categoryName' => ''
    );





    public function search($params)
    {

        $products = array();
        $products = $this->getList();

        $model = new \app\models\SearchForm();

        $model->load(\Yii::$app->request->get());

        if ($model->validate()) {

            $this->filterData['id'] = Yii::$app->request->get("SearchForm")["id"];
            $this->filterData['hidden'] = Yii::$app->request->get("SearchForm")["hidden"];
            $this->filterData['minPrice'] = Yii::$app->request->get("SearchForm")["minPrice"];
            $this->filterData['maxPrice'] = Yii::$app->request->get("SearchForm")["maxPrice"];
            $this->filterData['categoryName'] = Yii::$app->request->get("SearchForm")["categoryName"];
            //фильтрация
            $products = $this->filterData($products);
        }

        return $this->getProviderArray($products);

    }



    public function getProviderArray($products)
    {
        $provider = new ArrayDataProvider([
            'allModels' => $products,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'price', 'hidden', 'categoryName'],
            ],
        ]);

        return $provider;
    }




    public function getList()
    {
        // формирование массива с категориями и продуктами
        $this->categories = $this->makeCategoriesArray();
        $this->products = $this->makeProductArray($this->categories);

        return $this->products;
    }


    public function getData($key = '')
    {
        $dataArray = array();
        foreach($this->products as $productItem)
        {
            $dataArray[$productItem[$key]]  = $productItem[$key];
        }
        $dataArray = array_unique($dataArray);
        return $dataArray;
    }


    public function makeProductArray($categories)
    {
        $productAr = array();
        $products = $this->importCsv('products.xml');
        $products = $this-> xml2array($products);
        if(is_array($products)){
            $products = $products['item'];
            foreach($products as $key=>$product){

                $products[$key]['categoryName'] = $categories[$product['categoryId']];
            }
            return $products;
        }
    }

    public function filterData($products)
    {
        $filteredArray = array();
        foreach($products as $item)
        {
            if(($this->filterData['id'] == $item['id'] || empty($this->filterData['id'])) &&
                ($this->filterData['categoryName'] == $item['categoryName'] || empty($this->filterData['categoryName'])) &&
                ($this->filterData['hidden'] == $item['hidden'] || ($this->filterData['hidden'] == '')) &&
                ($this->filterData['minPrice'] < $item['price'] || empty($this->filterData['minPrice'])) &&
                ($this->filterData['maxPrice'] > $item['price'] || empty($this->filterData['maxPrice']))
            ){
                $filteredArray[] = $item;
            }
        }
        return $filteredArray;
    }



    public function makeCategoriesArray()
    {
        $categoryAr = array();
        $categories = $this->importCsv('categories.xml');
        $categories = $this-> xml2array($categories);
        if(is_array($categories)){
            foreach ($categories['item'] as $category){
                $categoryAr[$category['id']] = $category['name'];
            }
        }
        return $categoryAr;
    }


    public function importCsv($cvsName)
    {
        $this->pathToFile = realpath(Yii::$app->basePath) . '/uploads/'.$cvsName;
        if (file_exists($this->pathToFile)) {
            $xml = simplexml_load_file($this->pathToFile);
            return $xml;
        } else {
            return 'Не удалось открыть файл test.xml';
        }
    }


    public function xml2array($xml){
        $arr = array();
        foreach ($xml->children() as $r)
        {
            $t = array();
            if(count($r->children()) == 0)
            {
                $arr[$r->getName()] = strval($r);
            }
            else
            {
                $arr[$r->getName()][] = $this->xml2array($r);
            }
        }
        return $arr;
    }
}