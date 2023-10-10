<?php

namespace tests\unit\models;

use app\models\Task;
use Codeception\Test\Unit;

class TaskTest extends Unit
{
    public function testTitleIsRequired()
    {
        $model = new Task();

        $model->title = null;
        $this->assertFalse($model->validate(['title']), 'Title should be required');
    }

    public function testDescriptionIsSafe()
    {
        $model = new Task();

        $model->description = "Test description";
        $this->assertTrue($model->validate(['description']), 'Description should be safe');
    }

    public function testValidPriority()
    {
        $model = new Task();

        $model->priority = 'LOW';
        $this->assertTrue($model->validate(['priority']), 'Priority should be valid');

        $model->priority = 'INVALID_PRIORITY';
        $this->assertFalse($model->validate(['priority']), 'Priority should be invalid');
    }

    public function testValidStatus()
    {
        $model = new Task();

        $model->status = 'PENDING';
        $this->assertTrue($model->validate(['status']), 'Status should be valid');

        $model->status = 'INVALID_STATUS';
        $this->assertFalse($model->validate(['status']), 'Status should be invalid');
    }
}
