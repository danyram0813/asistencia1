<?php

namespace app\controllers;

use app\models\Periodo;
use app\models\search\PeriodoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\helpers\Json;

/**
 * PeriodoController implements the CRUD actions for Periodo model.
 */
class PeriodoController extends Controller
{
    public $freeAccessActions = [];
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
     * Lists all Periodo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeriodoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

        //Confirmar cambio de Vigente
        public function actionConfirmar(){
            if(Yii::$app->request->isAjax) {
                    $req = Yii::$app->request->post('datos');
                    $id=$req['id'];                 //solicitud
                    $model = $this->findModel($id);
                    $confirmado = ($model->vigente==1) ? 0 : 1;
                    $model->vigente = $confirmado;
                    //$db->createCommand("UPDATE cicloescolar SET vigente=0")->execute();
                    //Cicloescolar::updateAllCounters(['vigente' => 0]);
                    //$this->actionChange();
                    if($model->update()){
                        return 'Actualizado';
                    }else{
                        return 'Error al actualizar';
                    }
            }
                return '0';    
        }
    

    /**
     * Displays a single Periodo model.
     * @param int $ID ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($ID),
        ]);
    }

    /**
     * Creates a new Periodo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Periodo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        elseif (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } else {
            return $this->render('create', [
                        'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Periodo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ID ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID)
    {
        $model = $this->findModel($ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        elseif (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model
        ]);
        } else {
        return $this->render('update', [
            'model' => $model,
        ]);
        }
    }

    /**
     * Deletes an existing Periodo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ID ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID)
    {
        $this->findModel($ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Periodo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ID ID
     * @return Periodo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID)
    {
        if (($model = Periodo::findOne(['ID' => $ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
