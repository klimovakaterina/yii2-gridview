<?php
\Yii::$container->set('yii\grid\GridView', [
    'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => 'Не задано1',
    ],
]);