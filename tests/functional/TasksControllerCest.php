<?php

namespace tests\functional;

use tests\FunctionalTester;

class TasksControllerCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('tasks/create');
    }

    public function openCreatePage(FunctionalTester $I)
    {
        $I->see('Create Task', 'h1');
    }

    public function submitValidData(FunctionalTester $I)
    {
        $I->submitForm('#task-form', [
            'Task[title]' => 'Test Task',
            'Task[description]' => 'This is a test task description',
            'Task[priority]' => 'MEDIUM',
            'Task[status]' => 'PENDING',
        ]);
        $I->seeRecord('app\models\Task', [
            'title' => 'Test Task',
            'description' => 'This is a test task description',
            'priority' => 'MEDIUM',
            'status' => 'PENDING'
        ]);
        $I->see('Task is successfully created');
    }
}
