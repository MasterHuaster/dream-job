<?php

namespace app\models;

use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['title', 'required'],
            ['description', 'safe'],
            ['priority', 'in', 'range' => ['LOW', 'MEDIUM', 'HIGH']],
            ['status', 'in', 'range' => ['PENDING', 'COMPLETED']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название',
            'description' => 'Описание',
            'priority' => 'Приоритет',
            'status' => 'Статус',
        ];
    }

    public function getPriorityLabel(): string {
        $priorities = [
            'LOW' => 'Низкий',
            'MEDIUM' => 'Средний',
            'HIGH' => 'Высокий',
        ];

        return $priorities[$this->priority] ?? 'Не определено';
    }

    public function getStatusLabel(): string {
        $statuses = [
            'PENDING' => 'В работе',
            'COMPLETED' => 'Завершено',
        ];

        return $statuses[$this->status] ?? 'Не определено';
    }

}