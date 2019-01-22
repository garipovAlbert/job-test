<?php

use app\models\ProductView;
use app\models\ProductViewSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $dataProvider ActiveDataProvider */
/* @var $searchModel ProductViewSearch */
?>


<!-- grid -->
<?php
$typeList = ProductView::getTypeList();

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['style' => 'width: 60px'],
        ],
        [
            'attribute' => 'type',
            // фильтрация по типу модели в выпадающем списке
            'filter' => array_combine($typeList, $typeList),
            'headerOptions' => ['style' => 'width: 200px'],
        ],
        [
            'attribute' => 'title',
            'format' => 'raw',
            'value' => function(ProductView $model) {
                // значение колонки title вывести в strong теге
                return Html::tag('strong', Html::encode($model->title));
            },
        ],
        [
            'attribute' => 'price',
            // значение колонки price вывести в денежном формате
            'format' => ['currency', 'RUR'], // Либо ['decimal', 2]
            'headerOptions' => ['style' => 'width: 200px'],
        ],
    ],
]);
?>
<!-- /grid -->