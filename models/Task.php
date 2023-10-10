<?php

namespace app\models;

use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
    const PRIORITY = [
        'LOW' => 'Низкий',
        'MEDIUM' => 'Средний',
        'HIGH' => 'Высокий',
    ];

    const STATUSES = [
        'PENDING' => 'В работе',
        'COMPLETED' => 'Завершено',
    ];

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
            'created_at' => 'Дата создания',
        ];
    }

    public function getPriorityLabel(): string {
        return Task::PRIORITY[$this->priority] ?? 'Не определено';
    }

    public function getStatusLabel(): string {
        return Task::STATUSES[$this->status] ?? 'Не определено';
    }

}