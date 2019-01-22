<?php

namespace app\controllers;

use app\models\ProductViewSearch;
use Yii;
use yii\web\Controller;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new ProductViewSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

}