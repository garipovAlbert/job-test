<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @author albert
 * 
 * @property string $id
 * @property string $type
 * @property string $title
 * @property string $price
 */
class ProductView extends ActiveRecord
{

    const TYPE_APPLE = Apple::TYPE_MODEL;
    const TYPE_CLOCK = Clock::TYPE_MODEL;
    const TYPE_CAR = Car::TYPE_MODEL;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_view}}';
    }

    /**
     * Список типов продукта
     * @return array
     */
    public static function getTypeList()
    {
        return [
            static::TYPE_APPLE,
            static::TYPE_CLOCK,
            static::TYPE_CAR,
        ];
    }

}