<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */


?>


<div class="post-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]);


    // выбранное id
    $optionsId = array();
    if(!empty($products->filterData['id']))
        $optionsId = array($products->filterData['id']=>array('selected'=>true));
    $paramsId = [
        'prompt' => 'Выберите значение',
        'options' => $optionsId
    ];


    // поле hidden
    $optionsHidden = array();
    if(isset($products->filterData['hidden']))
        $optionsHidden = array($products->filterData['hidden']=>array('selected'=>true));
    $paramsHidden = [
        'prompt' => 'Выберите значение',
        'options' => $optionsHidden
    ];


    // поле категория
    $optionsCategory = array();
    if(!empty($products->filterData['categoryName']))
        $optionsCategory = array($products->filterData['categoryName']=>array('selected'=>true));
    $paramsCategory = [
        'prompt' => 'Выберите категорию',
        'options' => $optionsCategory
    ];

    ?>


    <?= $form->field($model, 'id')->dropDownList(
            $idProductList,
            $paramsId
    );  ?>
	
	<div class="row">
        <div class="col-xs-6">
			<?= $form->field($model, 'minPrice')->textInput(['value' => $products->filterData['minPrice'] ]); ?>
		</div>	
		<div class="col-xs-6">
			<?= $form->field($model, 'maxPrice')->textInput(['value' => $products->filterData['maxPrice'] ]); ?>
		</div>
	</div>		
			
	<?= $form->field($model, 'hidden')->dropDownList(
	        $model->hidden,
            $paramsHidden
    ); ?>
	<?= $form->field($model, 'categoryName')->dropDownList(
	        $categoryList,
            $paramsCategory
    ); ?>
	

    <div class="form-group">
        <?= Html::submitButton('Искать', ['class' => 'btn btn-primary']) ?>
		<?= Html::a("Сбросить", Url::toRoute([]), ['class' => 'btn btn-default']) ?>
		
    </div>

    <?php ActiveForm::end(); ?>
</div>