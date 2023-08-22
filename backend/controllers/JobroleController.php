<?php

namespace backend\controllers;

use common\models\JobRole;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JobRoleController implements the CRUD actions for JobRole model.
 */
class JobroleController extends Controller
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
     * Lists all JobRole models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => JobRole::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'role_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JobRole model.
     * @param int $role_id Role ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($role_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($role_id),
        ]);
    }

    /**
     * Creates a new JobRole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new JobRole();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'role_id' => $model->role_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing JobRole model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $role_id Role ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($role_id)
    {
        $model = $this->findModel($role_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'role_id' => $model->role_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing JobRole model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $role_id Role ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($role_id)
    {
        $this->findModel($role_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JobRole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $role_id Role ID
     * @return JobRole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($role_id)
    {
        if (($model = JobRole::findOne(['role_id' => $role_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
