<?php

namespace app\models;

use yii\data\ActiveDataProvider;

/**
 * @author Albert Garipov <bert320@gmail.com>
 */
class ProductViewSearch extends ProductView
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['type', 'title', 'price'],
                'safe',
            ],
        ];
    }

    /**
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params = [])
    {
        $query = ProductView::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // количество элементов на странице - 20 единиц
        $provider->pagination->defaultPageSize = 20;

        $provider->sort->defaultOrder = [
            'price' => SORT_DESC,
        ];

        // Если есть данные для загрузки в модель и они прошли валидацию...
        if ($this->load($params) && $this->validate()) {
            // ...применить фильтры
            $query->andFilterWhere(['like', 'title', $this->title]);
            $query->andFilterWhere(['type' => $this->type]);
            $query->andFilterCompare('price', $this->price);
        }

        return $provider;
    }

}