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
     * @return string
     */
    public function actionIndex()
    {
    //     $dataProvider = new ActiveDataProvider([
    //         'query' => Walkin::find(),
    //         /*
    //         'pagination' => [
    //             'pageSize' => 50
    //         ],
    //         'sort' => [
    //             'defaultOrder' => [
    //                 'walkin_id' => SORT_DESC,
    //             ]
    //         ],
    //         */
    //     ]);
    //     return $this->render('index', [
    //         'dataProvider' => $dataProvider,
    //     ]);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $walkin_id=Yii::$app->getRequest()->getQueryParam('id');
        if($walkin_id!=NULL){
            $walkin_id=Yii::$app->getRequest()->getQueryParam('id');
        $query = (new \yii\db\Query())
        ->select(['*'])
        ->from('walkin')
        ->where(['walkin_id' => $walkin_id])->one();
        return $query;
        }
        else{
        $query = (new \yii\db\Query())
        ->select(['*'])
        ->from('walkin')->all();
        return $query;
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
