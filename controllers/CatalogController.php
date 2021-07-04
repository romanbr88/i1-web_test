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

        $customTitle = Catalog::getBrandNameByAlias($searchModel->brand) . ' ' . Catalog::getModelNameByAlias($searchModel->model);

        return $this->render('index', compact('searchModel', 'dataProvider', 'customTitle'));
    }
}