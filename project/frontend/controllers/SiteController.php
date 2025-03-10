<?php

namespace frontend\controllers;

use common\models\FilmSession;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $sessions = FilmSession::find()->orderBy(['datetime' => SORT_DESC])->all();
        return $this->render('index', [
            'sessions' => $sessions,
        ]);
    }

    public static function powered(): string
    {
        return \Yii::t('app', 'Powered by {Arckady}', [
            'Arckady' => '<a href="https://github.com/Arckady/" rel="external">' . \Yii::t('app', 'Arckady') . '</a>',
        ]);
    }
}
