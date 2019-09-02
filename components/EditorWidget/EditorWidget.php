<?php

namespace app\components\EditorWidget;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;


class EditorWidget extends Widget
{
    public $field;
    public $options = [];


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $js = [];
        $view = $this->getView();

        EditorWidgetAsset::register($view);
        $id = $this->field;

        $this->options['selector'] = "#$id";


        $options = Json::encode($this->options);

        $js[] = "tinymce.init($options);";
        $view->registerJs(implode("\n", $js));
    }
}