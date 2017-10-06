<?php

use Cake\ORM\Table;

class TasksTable extends Table {
    
    /**
     * Returns all tasks in the database
     * @return array
     */
    public function getAllTasks() {
        $objTasks = [
            [
                'id' => 1,
                'taskName' => 'This is task one',
                'dueDate' => '05-11-2017',
                'createdOn' => '03-11-2017',
                'statusID'  => 1,
                'statusName' => 'Planned'
            ],[
                'id' => 2,
                'taskName' => 'This is task two',
                'dueDate' => '05-11-2017',
                'createdOn' => '03-11-2017',
                'statusID'  => 2,
                'statusName' => 'InProgress'
            ]
        ];
        return $objTasks;
    }

}
