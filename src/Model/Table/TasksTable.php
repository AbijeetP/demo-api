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
                'dueDate' => '05-10-2017',
                'createdOn' => '01-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 2,
                'taskName' => 'This is task two',
                'dueDate' => '04-10-2017',
                'createdOn' => '01-10-2017',
                'completedOn' => '01-10-2017',
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done'
            ],[
                'id' => 3,
                'taskName' => 'This is task three',
                'dueDate' => '07-10-2017',
                'createdOn' => '02-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 4,
                'taskName' => 'This is task four',
                'dueDate' => '09-10-2017',
                'createdOn' => '03-10-2017',
                'completedOn' => '05-10-2017',
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done'
            ],[
                'id' => 5,
                'taskName' => 'This is task five',
                'dueDate' => '15-10-2017',
                'createdOn' => '03-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ],[
                'id' => 6,
                'taskName' => 'This is task five',
                'dueDate' => '11-10-2017',
                'createdOn' => '04-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['In Progress'],
                'statusName' => 'In Progress'
            ],[
                'id' => 7,
                'taskName' => 'This is task five',
                'dueDate' => '07-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ],[
                'id' => 8,
                'taskName' => 'This is task five',
                'dueDate' => '08-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '05-10-2017',
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done'
            ],[
                'id' => 9,
                'taskName' => 'This is task five',
                'dueDate' => '10-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['In Progress'],
                'statusName' => 'In Progress'
            ],[
                'id' => 10,
                'taskName' => 'This is task five',
                'dueDate' => '13-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ],[
                'id' => 11,
                'taskName' => 'This is task five',
                'dueDate' => '13-10-2017',
                'createdOn' => '07-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ],[
                'id' => 12,
                'taskName' => 'This is task five',
                'dueDate' => '08-10-2017',
                'createdOn' => '07-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 13,
                'taskName' => 'This is task five',
                'dueDate' => '07-10-2017',
                'createdOn' => '07-10-2017',
                'completedOn' => '08-10-2017',
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done'
            ],[
                'id' => 14,
                'taskName' => 'This is task five',
                'dueDate' => '12-10-2017',
                'createdOn' => '09-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 15,
                'taskName' => 'This is task five',
                'dueDate' => '12-10-2017',
                'createdOn' => '12-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ]
        ];
        return $arrTasks;
    }
    
    /**
     * Returns the tasks count by its status
     * @return array
     */
    public function getTasksByStatus(){
        $arrTasks = [
            [
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned',
                'totalTasksCount' => 5
            ],[
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked',
                'totalTasksCount' => 4
            ],[
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done',
                'totalTasksCount' => 4
            ],[
                'statusID'  => $this->arrStatues['In Progress'],
                'statusName' => 'In Progress',
                'totalTasksCount' => 2
            ]
        ];
        return $arrTasks;
    }
    
    /**
     * Returns completed tasks count on a date
     * @return array
     */
    public function getCompletedTasksByDay(){
        $arrTasks = [
            [
                'completedOn' => '01-10-2017',
                'totalTasksCount' => 1
            ],[
                'completedOn' => '02-10-2017',
                'totalTasksCount' => 0
            ],[
                'completedOn' => '03-10-2017',
                'totalTasksCount' => 0
            ],[
                'completedOn' => '04-10-2017',
                'totalTasksCount' => 0
            ],[
                'completedOn' => '05-10-2017',
                'totalTasksCount' => 2
            ],[
                'completedOn' => '06-10-2017',
                'totalTasksCount' => 0
            ],[
                'completedOn' => '07-10-2017',
                'totalTasksCount' => 0
            ],[
                'completedOn' => '08-10-2017',
                'totalTasksCount' => 1
            ]
        ];
        
        return $arrTasks;
    }
    
}
