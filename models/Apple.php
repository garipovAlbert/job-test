<?php

namespace app\models;

/**
 * Class Apple
 *
 * @property integer $id                         Идентификатор элемента
 * @property string  $variety                    Наименоваение сорта яблок
 * @property double  $cost                       Стоимость элемента
 *
 * @package test\models
 */
class Apple extends \yii\db\ActiveRecord
{

    const TYPE_MODEL = 'Яблоко';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%apple}}';
    }

}