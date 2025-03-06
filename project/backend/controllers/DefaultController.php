<?php

namespace backend\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex(): string
    {
        $this->view->title = 'Панель администратора';

        return $this->render('index');
    }
}