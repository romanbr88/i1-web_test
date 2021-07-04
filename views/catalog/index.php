<?php

use app\models\Brand;
use app\models\Model;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Продажа новых автомобилей ' . $customTitle . ' в Санкт-Петербурге';

?>
<div class="row">
    <div class="col-xs-3">
         <?= $this->render('_search', ['model' => $searchModel]) ?>
    </div>
    <div class="col-xs-9">
        <?php Pjax::begin([
            'formSelector' => '#filter-form',
            'enableReplaceState' => true,
        ]); ?>
        <h1><?= $this->title ?></h1>
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => "{items}\n{pager}",
            'itemView' => '_list',
            'emptyText' => 'Ничего не найдено',
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
