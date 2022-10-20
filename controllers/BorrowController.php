<?php

namespace app\controllers;

use app\models\Borrow;
use app\models\BorrowSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BorrowController implements the CRUD actions for Borrow model.
 */
class BorrowController extends Controller
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
     * Lists all Borrow models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BorrowSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all users borrows history model.
     *
     * @return string
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionHistory($id_user)
    {
        $searchModel = new BorrowSearch();
        $dataProvider = $searchModel->searchHistory($this->request->post($id_user));

        return $this->render('history', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id_user),
        ]);
    }

    /**
     * Displays a single Borrow model.
     * @param int $id_borrow Id Borrow
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_borrow)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_borrow),
        ]);
    }

    /**
     * Creates a new Borrow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Borrow();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_borrow' => $model->id_borrow]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Borrow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_borrow Id Borrow
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_borrow)
    {
        $model = $this->findModel($id_borrow);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_borrow' => $model->id_borrow]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Borrow model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_borrow Id Borrow
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_borrow)
    {
        $this->findModel($id_borrow)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Borrow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_borrow Id Borrow
     * @return Borrow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_borrow)
    {
        if (($model = Borrow::findOne(['id_borrow' => $id_borrow])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
