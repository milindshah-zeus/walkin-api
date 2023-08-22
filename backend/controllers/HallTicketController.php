<?php

namespace backend\controllers;


use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * WalkinController implements the CRUD actions for Walkin model.
 */
class HallTicketController extends Controller
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
        $hallticket_id = Yii::$app->getRequest()->getQueryParam('id');
        if($hallticket_id!=NULL){
            $command = $connection->createCommand('
            select walkin.role_type,application.hallticket_id,
            applicant.first_name, applicant.last_name,
            applicant.email,walkin_slots.start_time,
            walkin_slots.end_time,walkin.location,
            walkin.start_date 
            FROM walkin 
            JOIN application on walkin.walkin_id=application.walkin_id 
            JOIN applicant ON application.applicant_id=applicant.applicant_id
            JOIN walkin_slots ON application.slot_id = walkin_slots.slot_id
            WHERE application.hallticket_id=:hallticket_id;   ',
            [':hallticket_id' => $hallticket_id]);
            return $command->queryAll();
        }
    }

}
