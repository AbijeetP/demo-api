<?php

use Cake\ORM\Table;

class TasksTable extends Table {
    private $arrStatues = ['Blocked' => 1, 'Done' => 2, 'In Progress' => 3, 'Planned' => 4];
    
    public function initialize(array $config) {
        parent::initialize($config);
    }

    /**
     * Returns all tasks in the database
     * @return array
     */
    public function getAllTasks() {
        $arrTasks = [
            [
                'id' => 1,
                'taskName' => 'This is task one',
                'dueDate' => '05-11-2017',
                'createdOn' => '03-11-2017',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 2,
                'taskName' => 'This is task two',
                'dueDate' => '05-11-2017',
                'createdOn' => '03-11-2017',
                'statusID'  => $this->arrStatues['In Progress'],
                'statusName' => 'In Progress'
            ],[
                'id' => 3,
                'taskName' => 'This is task three',
                'dueDate' => '05-11-2017',
                'createdOn' => '03-11-2017',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 4,
                'taskName' => 'This is task four',
                'dueDate' => '05-11-2017',
                'createdOn' => '03-11-2017',
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done'
            ],[
                'id' => 5,
                'taskName' => 'This is task five',
                'dueDate' => '05-11-2017',
                'createdOn' => '03-11-2017',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ]
        ];
        return $arrTasks;
    }

}
