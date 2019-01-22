<?php

namespace app\models;

/**
 * Class Car
 *
 * @property integer $id         Идентификатор элемента
 * @property string  $name       Наименование автомобиля
 * @property double  $price      Стоимость
 *
 * @package test\models
 */
class Car extends \yii\db\ActiveRecord
{

    const TYPE_MODEL = 'Автомобиль';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%car}}';
    }

}