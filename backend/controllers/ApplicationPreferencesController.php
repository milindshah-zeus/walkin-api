<?php


namespace backend\controllers;

use yii\web\Controller;
use yii;


class ApplicationPreferencesController extends Controller {
    
    public function actionIndex()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $connection = Yii::$app->getDb();
        $hallticket_id = Yii::$app->getRequest()->getQueryParam('id');
        if ($hallticket_id != NULL) {
            $command = $connection->createCommand(
                '
            select job_role.* from job_role
             RIGHT JOIN walkin_role ON walkin_role.role_id = job_role.role_id 
             JOIN application_preference ON application_preference.walkin_role_id=walkin_role.walkin_role_id 
             WHERE application_preference.hallticket_id= :hallticket_id; ',
                [':hallticket_id' => $hallticket_id]
            );
            return $command->queryAll();
        }
    }
}

?>