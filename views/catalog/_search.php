<?php

use app\models\Brand;
use app\models\Drive;
use app\models\Engine;
use app\models\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;use yii\widgets\ActiveForm;

$brands = Brand::find()->all();
$models = Model::find()->all();
$engines = Engine::find()->all();
$drives = Drive::find()->all();

?>

<div class="catalog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id' => 'filter-form',
    ]); ?>

    <?= $form->field($model, 'brand')->dropDownList(ArrayHelper::map($brands, 'alias', 'name'), [
        'prompt' => '',
    ])->label('Марка автомобиля') ?>

    <?= $form->field($model, 'model')->dropDownList(ArrayHelper::map($models, 'alias', 'name'), [
        'prompt' => '',
    ])->label('Модель') ?>

    <?= $form->field($model, 'engine')->dropDownList(ArrayHelper::map($engines, 'alias', 'type'), [
            'prompt' => '',
    ])->label('Тип двигателя') ?>

    <?= $form->field($model, 'drive')->dropDownList(ArrayHelper::map($drives, 'alias', 'type'), [
            'prompt' => '',
    ])->label('Привод') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']); ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>