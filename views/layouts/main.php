<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?= Html::csrfMetaTags() ?>
        <title>Job Test</title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <?= $content ?>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
