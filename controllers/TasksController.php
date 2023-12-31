<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\Task;
use yii\db\Query;

class TasksController extends Controller
{
    /**
     * Displays the list of tasks.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $query = Task::find();
        $fultext = Yii::$app->request->get('fultext');
        $priority = Yii::$app->request->get('priority');
        $status = Yii::$app->request->get('status');
        $sort = Yii::$app->request->get('sort', 'id');
        if (!empty($fultext)) {
            $query->andWhere(['or', ['like', 'title', $fultext], ['like', 'description', $fultext]]);
        }
        if (!empty($priority)) {
            $query->andWhere(['priority' => $priority]);
        }
        if (!empty($status)) {
            $query->andWhere(['status' => $status]);
        }
        $query->orderBy([$sort => SORT_DESC]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'fultext' => $fultext,
            'priority' => $priority,
            'status' => $status,
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
