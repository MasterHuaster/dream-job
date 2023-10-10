<?php
namespace tests\unit\fixtures;

use yii\test\ActiveFixture;

class TaskFixture extends ActiveFixture
{
    public $dataFile = '@tests/_data/task.php';
    public $modelClass = 'app\models\Task';
}