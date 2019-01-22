<?php

namespace test;

/**
 * Class ProductController
 *
 * @package test
 */
class ProductController extends yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => '\yii\filters\VerbFilter',
                'actions' => [
                    'index' => ['GET'],
                    'view' => ['GET'],
                    'update' => ['GET'], // Ошибка: здесь нужно добавить POST либо PATCH
                    'delete' => ['GET'], // Ошибка: здесь нужно добавить POST либо DELETE
                ],
            ],
        ];
    }

    /**
     * Действие странички со списком товаров
     *
     * @return mixed
     */
    public function actionIndex()
    {
        // Ошибка: Тут и везде в контроллере должна быть модель Product вместо Profile
        $searchModel = new Profile();

        // Рекомендация: желательно иметь отдельную модель, например ProductSearch, отнаследованную
        // от Product, где будет полностью свой массив валидаторов.
        $searchModel->setScenario(Profile::SCENARIO_SEARCH);

        // Ошибка: здесь нужно заменить на Yii::$app->request->get()
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Действие странички с детальным описанием товара
     *
     * @param null|integer $id
     *
     * @return mixed
     */
    public function actionView($id = null)
    {
        // Ошибка: $id не прошел очистку, здесь будет SQL-инъекция.
        // Правильный код выглядел бы примерно так 
        // Profile::find()->where(['id' => $id, 'is_published' = 1])->one();
        $product = Profile::find()->where('id=' . $id . ' AND is_published=1')->one();
        
        // Ошибка: здесь должна быть обработка ошибки в случае если product равен NULL
        // - выбрасывание исключения NotFoundHttpException

        // Замечание: этим правильней заниматься где-нибудь в начале самого файла отображения
        $this->view->title = 'Товар №' . $product->id;

        return $this->render('view', [
            'product' => $product,
        ]);
    }

    /**
     * Действие изменения товара
     *
     * @param $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Profile::findOne($id);
        
        // Ошибка: здесь должна быть обработка ошибки в случае если product равен NULL
        // - выбрасывание исключения NotFoundHttpException
        
        $model->setScenario(Profile::SCENARIO_EDIT);

        // Ошибка: нельзя загружать данные в модель из GET-параметров, т.к. в этом 
        // случае может возникнуть уязвимость к CSRF-атаке
        if ($model->load(Yii::$app->request->get()) && $model->save()) {
            // Замечание: здесь желательно передавать массив для Url::to(), т.к. формат адреса
            // может быть изменен компонентом urlManager и лучше, 
            // чтобы он же генерировал URL
            return $this->redirect('/default/update/?id=' . $model->id);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Действие удаленения товара
     *
     * @param $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        // Предупреждение: нужно, чтобы это действие проходило проверку CSRF-токена,
        // иначе - уязвимость к CSRF-атаке
        Profile::findOne($id)->delete();

        return $this->redirect(['list']);
    }

}