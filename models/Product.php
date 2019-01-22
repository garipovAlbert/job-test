<?php

namespace test;

/**
 * Class Product
 *
 * @property integer $id                  Идентификатор элемента
 * @property string  $title               Наименование
 * @property integer $is_published        Статус публикации
 * @property double  $price               Стоимость
 * @property integer $user_id             Идентификатор пользователя
 * @property string  $desc                Описание
 * @property string  $created_at
 * @property string  $updated_at
 *
 * @property string  $searchKeyword       Поисковая фраза

 * @package test
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @var
     */
    public $searchKeyword;

    // Ошибка: не указана таблица бд
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // Вопрос: user_id, вероятно, в данном случае не должен быть открыт для изменения
            // а должен быть проставлен автоматически при создании и равен ID пользователя, создавшего товар?
            // В таком случае user_id следует отделить и указать для него SCENARIO_SEARCH
            [['user_id', 'desc', 'price'], 'required', 'on' => self::SCENARIO_EDIT],
            [['price'], 'double'],
            // Ошибка: необходимо четко ограничить возможные значения поля.
            // Если это булево значение, то правильный код: 
            // ['is_published', 'in', 'range' => [1, 0]],
            [['is_published'], 'integer'],
            [['desc'], 'string'],
            // Ошибка: эти поля так же не должны быть открыты для редактирования. Необходимо 
            // указать SCENARIO_SEARCH
            // Замечание: обычно они проставляются автоматически с помощью TimestampBehavior
            [['created_at', 'updated_at'], 'save'],
            
            // Ошибка: отсутствует правило для searchKeyword, хотя по нему предполагается фильтрация.
        ];
    }

    /**
     * @param $params
     *
     * @return  yii\data\ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find();

        $dataProvider = new  yii\data\ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // Ошибка: следует поставить знак отрицания перед выражением в условии
        if ($this->validate()) {
            return $dataProvider;
        }

        // Ошибка: в данном случае следует использовать метод andFilterWhere, 
        // т.к. значения полей в фильтре могут быть пустыми.
        $query->where([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'is_published' => $this->is_published,
            'title' => $this->title,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        // Ошибка: необходимо добавить модель User к запросу через joinWith(),
        // а также использовать andFilterWhere() вместо where().
        $query->where(['OR', ['like', 'user.name', $this->searchKeyword], ['like', 'user.surname', $this->searchKeyword], ['like', 'desc', $this->searchKeyword]]);

        
        return $dataProvider;
    }

    /**
     * Связь с пользователем
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        // Ошибка: должно быть hasOne()
        return $this->hasMany(User::class, ['user_id' => 'id']);
    }

    /**
     * Получаем массив товаров c указанием данных пользователя
     *
     * @return array
     */
    public function getUsersProducts(): array
    {
        // Замечание: подобную структуру можно получить с использованием with():
        // $products = self::find()->with('user')->all();
        
        // Замечание: кончится память при большом количестве продуктов в базе
        
        /** @var self[] $products */
        $products = self::find()->asArray()->all();
        $result = [];

        for ($i = 0; $i < count($products); $i++) {
            $product = $products[$i];

            // Ошибка: result будет содержать один продукт, нужно $result[] = ...
            $result = [
                // Ошибка: product здесь будет массивом, т.к. запрос был с asArray()
                'id' => $product->id,
                'title' => $product->title,
                'price' => $product->price,
                'user' => [
                    'id' => $product->user_id,
                    // Замечание: здесь будет отдельный запрос к таблице user 
                    // для каждой итерации, что не оптимально в плане производительности.
                    'name' => $product->user->name,
                    'surname' => $product->user->surname,
                ],
            ];
        }

        return $result;
    }

}