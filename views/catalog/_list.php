<div class="card col-xs-6" data-key="<?= $model->id; ?>">
    <div class="card-body">
        <h3 class="card-title"><?= $model->model->brand->name . ' ' . $model->model->name ?></h3>
        <p class="card-text">
            <b>Тип двигателя: </b><?= $model->engine->type ?><br>
            <b>Привод: </b><?= $model->drive->type ?>
        </p>
    </div>
</div>
