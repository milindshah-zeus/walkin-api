<?php

namespace backend\controllers;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * WalkinController implements the CRUD actions for Walkin model.
 */
class WalkinRoleController extends Controller
{
    
    /**
     * Lists all Walkin models.
     *
     * @return json
     */
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $connection = Yii::$app->getDb();
        $walkin_id = Yii::$app->getRequest()->getQueryParam('id');
        if($walkin_id!=NULL){
            $command = $connection->createCommand('
            select job_role.* from job_role 
            JOIN walkin_role 
            on job_role.role_id=walkin_role.role_id 
            where walkin_role.walkin_id= :walkin_id;',
            [':walkin_id' => $walkin_id]);
            return $command->queryAll();
        }
    }

}
