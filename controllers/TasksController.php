<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\Task;

class TasksController extends Controller
{
    /**
     * Displays the list of tasks.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single task.
     *
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if task model cannot be found.
     */
    public function actionView(int $id): string
    {
        $model = Task::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('The requested task does not exist.');
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new task.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing task.
     *
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if task model cannot be found.
     */
    public function actionUpdate(int $id)
    {
        $model = Task::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('The requested task does not exist.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing task.
     *
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if task model cannot be found.
     */
    public function actionDelete(int $id): \yii\web\Response
    {
        $task = Task::findOne($id);

        if (!$task) {
            throw new NotFoundHttpException('The requested task does not exist.');
        }

        $task->delete();

        return $this->redirect(['index']);
    }
}
