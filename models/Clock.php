<?php

namespace app\models;

/**
 * @property integer $id                         Идентификатор элемента
 * @property string  $reference                  Индивидуальное наименование часов по каталогу производителя
 * @property double  $difference_price           Розничная цена
 *
 * @package      test\models
 */
class Clock extends \yii\db\ActiveRecord
{

    const TYPE_MODEL = 'Часы';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%clock}}';
    }

}