<?php

use yii\db\Migration;

/**
 * Class m190122_063302_task_1_test_data
 */
class m190122_063302_task_1_test_data extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $appleList = [
            'Анис Алый',
            'Анис Полосатый',
            'Абориген',
            'Антоновка',
            'Антоновка белая',
            'Антоновка Золотой Монах',
            'Антоновка-каменичка',
            'Апорт',
            'Башкирский Изумруд',
            'Башкирский Красавец',
            'Башкирское Зимнее',
            'Бельфлёр Башкирский',
            'Богатырь',
            'Боровинка',
            'Бабушкино',
            'Веньяминовское',
            'Грушовка московская',
            'Голден Делишес',
            'Гренни Смит',
            'Зестар',
            'Коричное полосатое',
            'Кребы',
            'Кандиль Синап',
            'Мелба',
            'Осеннее полосатое',
            'Орлик',
            'Папировка',
            'Пепин Башкирский',
            'Персиянка',
            'Ренет Симиренко',
            'Раннее Алое',
            'Ранетка',
            'Ред Делишес',
            'Ренет',
            'Ренет бленгеймский',
            'Ренет ландсбергский',
            'Сеянец Титовки',
            'Слава Переможцам',
            'Спартан',
            'Урал-тау',
            'Фуджи',
            'Чара',
            'Шаропай',
            'Malus Dolgo',
            'Malus Kerr',
            'Макинтош',
            'Malus Mutsu',
        ];

        foreach ($appleList as $apple) {
            $this->insert('{{%apple}}', [
                'variety' => $apple,
                'cost' => mt_rand(5, 20) * 10,
            ]);
        }

        $clockList = [
            ['reference' => 'Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 700-5 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 700-7 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 702-1 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 702-5 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 702-7 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 705-1 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 705-5 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'К 705-7 Будильник Восток', 'difference_price' => '2400'],
            ['reference' => 'БМК-5-1 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-4-1 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-6-3 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-3-1 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-2-1 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-1-2 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-6-1 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-5-2 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-1-1 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-3-2 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'BB-72-0 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'DN-10 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'FB51-10 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'LC-10 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'P 111005 будильник', 'difference_price' => '1750'],
            ['reference' => 'SP-10 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'BB-72-1 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'CS-11 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'DN-11 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'P 111001 будильник', 'difference_price' => '1750'],
            ['reference' => 'FB51-11 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'LC-11 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'SP-11 Будильник - мячик', 'difference_price' => '1000'],
            ['reference' => 'PM 150099 машинка', 'difference_price' => '1150'],
            ['reference' => 'PM 150081 машинка', 'difference_price' => '1150'],
            ['reference' => 'БМК-1-3 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-1-4 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-5-3 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'БМК-6-2 Будильник Восток механический', 'difference_price' => '3390'],
            ['reference' => 'Большой будильник Гранат GK-4', 'difference_price' => '2500'],
            ['reference' => 'Большой будильник Гранат GK-5', 'difference_price' => '2500'],
            ['reference' => 'Большой будильник Гранат GK-17', 'difference_price' => '2500'],
            ['reference' => 'Большой будильник Гранат GK-12-2', 'difference_price' => '2500'],
            ['reference' => 'Большой будильник Гранат GK-26', 'difference_price' => '2500'],
        ];
        foreach ($clockList as $clock) {
            $this->insert('{{%clock}}', $clock);
        }

        $carList = [
            ['name' => 'Chevrolet Aveo', 'price' => '239000'],
            ['name' => 'ВАЗ (Lada) Kalina', 'price' => '307000'],
            ['name' => 'Kia Spectra', 'price' => '207000'],
            ['name' => 'ВАЗ (Lada) Granta', 'price' => '314000'],
            ['name' => 'Daewoo Gentra', 'price' => '367000'],
            ['name' => 'Hyundai Getz', 'price' => '275000'],
            ['name' => 'Geely Emgrand EC7', 'price' => '362900'],
            ['name' => 'Kia Rio', 'price' => '376000'],
            ['name' => 'Chevrolet Spark', 'price' => '135000'],
            ['name' => 'Hyundai Accent', 'price' => '236000'],
            ['name' => 'Volkswagen Polo', 'price' => '437000'],
            ['name' => 'Renault Sandero', 'price' => '362000'],
            ['name' => 'Peugeot 308', 'price' => '323000'],
            ['name' => 'Toyota Auris', 'price' => '420000'],
            ['name' => 'Skoda Yeti', 'price' => '517000'],
            ['name' => 'Nissan Juke', 'price' => '745000'],
        ];
        foreach ($carList as $car) {
            $this->insert('{{%car}}', $car);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->truncateTable("{{%car}}");
        $this->truncateTable("{{%clock}}");
        $this->truncateTable("{{%apple}}");
    }

}