<?php

namespace app\controllers;

use app\models\Catalog;
use app\models\CatalogSearch;
use app\models\Drive;
use app\models\Engine;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);

        $brandAlias = $searchModel->brand ?? '';
        $modelAlias = $searchModel->model ?? '';
        $customTitle = Catalog::getBrandNameByAlias($brandAlias) . ' ' . Catalog::getModelNameByAlias($modelAlias);

        return $this->render('index', compact('searchModel', 'dataProvider', 'customTitle'));
    }
}