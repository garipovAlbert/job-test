<?php

use yii\db\Migration;

/**
 * Class m190122_062704_task_1_structure
 */
class m190122_062704_task_1_structure extends Migration
{

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%apple}} (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `variety` varchar(255) DEFAULT NULL,
                `cost` decimal(10,2) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%car}} (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) DEFAULT NULL,
                `price` decimal(10,2) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");
        $this->execute("
            CREATE TABLE IF NOT EXISTS {{%clock}} (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `reference` varchar(255) DEFAULT NULL,
                `difference_price` decimal(10,2) DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ");

        $this->execute("
            CREATE OR REPLACE VIEW {{%product_view}} AS
            (
                SELECT 
                    apple.id AS id,
                    'Яблоко' AS type,
                    variety AS title,
                    cost AS price
                FROM {{%apple}}
            )
            UNION
            (
                SELECT 
                    id, 
                    'Автомобиль' AS `type`, 
                    name AS title,
                    price AS price
                FROM {{%car}}
            )
            UNION
            (
                SELECT 
                    id,
                    'Часы' AS `type`,
                    reference AS title,
                    difference_price AS price
                FROM {{%clock}}
            )
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute("DROP TABLE IF EXISTS {{%clock}}");
        $this->execute("DROP TABLE IF EXISTS {{%car}}");
        $this->execute("DROP TABLE IF EXISTS {{%apple}}");

        $this->execute("DROP VIEW IF EXISTS {{%product_view}}");
    }

}