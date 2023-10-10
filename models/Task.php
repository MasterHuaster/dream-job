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
}