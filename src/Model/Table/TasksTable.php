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
                'taskName' => 'Vitae eget ipsum, cursus dui aenean',
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
                'taskName' => 'A per ac, a nec et vitae vitae gravida, nulla luctus ultrices nonummy egestas',
                'dueDate' => '11-10-2017',
                'createdOn' => '04-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['In Progress'],
                'statusName' => 'In Progress'
            ],[
                'id' => 7,
                'taskName' => 'Velit eu est, quis eget, in vestibulum feugiat nibh nibh fermentum',
                'dueDate' => '07-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ],[
                'id' => 8,
                'taskName' => ' Augue felis id, habitasse scelerisque sed eget, quam inceptos eu fames fringilla',
                'dueDate' => '08-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '05-10-2017',
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done'
            ],[
                'id' => 9,
                'taskName' => 'Velit eu est, quis eget, in vestibulum feugiat nibh nibh fermentum',
                'dueDate' => '10-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['In Progress'],
                'statusName' => 'In Progress'
            ],[
                'id' => 10,
                'taskName' => 'Dolor curabitur dolore, vivamus non praesent quis',
                'dueDate' => '13-10-2017',
                'createdOn' => '05-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ],[
                'id' => 11,
                'taskName' => 'Sagittis enim primis eu nulla, lobortis et molestie laoreet nunc',
                'dueDate' => '13-10-2017',
                'createdOn' => '07-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Blocked'],
                'statusName' => 'Blocked'
            ],[
                'id' => 12,
                'taskName' => 'Orci massa dolor, lorem augue aenean vitae orci, quam gravida volutpat eu sit eget',
                'dueDate' => '08-10-2017',
                'createdOn' => '07-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 13,
                'taskName' => 'Nullam quisque erat libero proin tempor.',
                'dueDate' => '07-10-2017',
                'createdOn' => '07-10-2017',
                'completedOn' => '08-10-2017',
                'statusID'  => $this->arrStatues['Done'],
                'statusName' => 'Done'
            ],[
                'id' => 14,
                'taskName' => 'Magnis laudantium duis. ',
                'dueDate' => '12-10-2017',
                'createdOn' => '09-10-2017',
                'completedOn' => '',
                'statusID'  => $this->arrStatues['Planned'],
                'statusName' => 'Planned'
            ],[
                'id' => 15,
                'taskName' => 'Mollis enim sed sapien amet praesent. ',
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
