<?php

namespace backend\controllers;

use common\models\Walkin;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;

/**
 * WalkinController implements the CRUD actions for Walkin model.
 */
class WalkinController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

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
            select walkin.*,
            GROUP_CONCAT(job_role.role_name) as "roles", 
            GROUP_CONCAT( walkin_slots.start_time ) AS start_time,
            GROUP_CONCAT( walkin_slots.end_time ) AS end_time 
            FROM walkin JOIN walkin_role 
            ON walkin.walkin_id=walkin_role.walkin_id JOIN job_role
            ON job_role.role_id=walkin_role.role_id JOIN walkin_slots
            ON walkin_slots.walkin_id=walkin.walkin_id
            WHERE walkin.walkin_id= :walkin_id
            GROUP BY walkin.walkin_id;',
            [':walkin_id' => $walkin_id]);
            return $command->queryOne();
        }
        else{
            $command = $connection->createCommand('
            select walkin.*,
            GROUP_CONCAT(job_role.role_name) as "roles", 
            GROUP_CONCAT( walkin_slots.start_time ) AS start_time,
            GROUP_CONCAT( walkin_slots.end_time ) AS end_time 
            FROM walkin JOIN walkin_role 
            ON walkin.walkin_id=walkin_role.walkin_id JOIN job_role
            ON job_role.role_id=walkin_role.role_id JOIN walkin_slots
            ON walkin_slots.walkin_id=walkin.walkin_id
            GROUP BY walkin.walkin_id;');
            return $command->queryAll();
       }
    }

    /**
     * Displays a single Walkin model.
     * @param int $walkin_id Walkin ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($walkin_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($walkin_id),
        ]);
    }

    /**
     * Creates a new Walkin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Walkin();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'walkin_id' => $model->walkin_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Walkin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $walkin_id Walkin ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($walkin_id)
    {
        $model = $this->findModel($walkin_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'walkin_id' => $model->walkin_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Walkin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $walkin_id Walkin ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($walkin_id)
    {
        $this->findModel($walkin_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Walkin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $walkin_id Walkin ID
     * @return Walkin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($walkin_id)
    {
        if (($model = Walkin::findOne(['walkin_id' => $walkin_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
