<?php

namespace app\controllers;

use app\models\Book;
use app\models\BookSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
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
     * Lists all Book models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param int $id_book Id Book
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_book)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_book),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Book();

        $this->uploadImage($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_book Id Book
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_book)
    {
        $model = $this->findModel($id_book);

        $this->uploadImage($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_book Id Book
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_book)
    {
        $model = $this->findModel($id_book);

        if (file_exists($model->cover)) {
            unlink($model->cover);
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_book Id Book
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_book)
    {
        if (($model = Book::findOne(['id_book' => $id_book])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Uploads the cover of a book.
     *  
     */
    protected function uploadImage(Book $model)
    {

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $model->image = UploadedFile::getInstance($model, 'image');

                if ($model->validate()) {

                    if ($model->image) {

                        if(file_exists($model->cover)){
                            unlink($model->cover);
                        }

                        $routeFile = 'uploads/books/' . time() . "_" . $model->image->baseName . "." . $model->image->extension;

                        if ($model->image->saveAs($routeFile)) {
                            $model->cover = $routeFile;
                        }
                    }
                }

                if ($model->save(false)) {
                    return $this->redirect(['index']);
                }
            }
        }
    }
}
