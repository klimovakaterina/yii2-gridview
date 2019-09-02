<?php
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use app\components\EditorWidget\EditorWidget;


use app\helpers\KstringHelpers;
//use yii\helpers\Html;

echo KstringHelpers::cutString("You can see a variety of methods are included of different types. For example, getDisplayName() returns either a username, an email, or concatenated strings of first and last name when available.", 12);


echo '<br>';

echo KstringHelpers::camelCase("created_at ");

echo '<br>';
echo KstringHelpers::translitString("Купи слона");
//NumberHelper::format(18878334526.3);


//Yii::$app->myHelper::cutString("You can see a variety of methods are included of different types. For example, ", 3);

echo GridView::widget([
    'dataProvider' => $provider,
]);
?>

<div class="form-group field-election-election_description">
    <textarea id="basic-example" class="form-control" name="Election[election_description]"></textarea>
</div>
<?
EditorWidget::widget(['field' => 'basic-example']);


echo '<hr>';