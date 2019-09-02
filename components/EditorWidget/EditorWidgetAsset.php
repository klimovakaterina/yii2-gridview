<?php


namespace app\components\EditorWidget;

use yii\web\AssetBundle;

class EditorWidgetAsset extends AssetBundle
{
    public $sourcePath = "@app/components/EditorWidget/assets";

    public $js = [
        'js/tinymce.min.js',
        'tinymce_include.js'
    ];



}