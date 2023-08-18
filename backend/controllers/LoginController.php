<?php

namespace backend\controllers;

use yii\rest\Controller;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii;

class LoginController extends Controller{

    
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'index' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $request = Yii::$app->request;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $post = $request->post();
        
        
        $email = $post['email'];
        $pass= $post['password'];
        
        $query = (new \yii\db\Query())
        ->select(['email'])
        ->from('applicant')
        ->where(['email'=>$email,'user_password' => $pass])->one();
        return $query;
        
    }
}