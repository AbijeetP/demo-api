<?php

namespace App\Model\Table;
use Cake\Core\Configure;

class TasksTable extends AppTable {
    
    public function initialize(array $config) {
        parent::initialize($config);
    }

    /**
     * Returns all tasks in the database
     * @return array
     */
    public function getAllTasks() {
        $allTasks = $this->getFileInfo(Configure::read('GET_ALL_TASKS'));
        return json_decode($allTasks);
    }
    
    /**
     * Returns the tasks count by its status
     * @return array
     */
    public function getTasksByStatus(){
        $taskDtls = $this->getFileInfo(Configure::read('GET_TASKS_BY_STATUS'));
        return json_decode($taskDtls);
    }
    
    /**
     * Returns completed tasks count on a date
     * @return array
     */
    public function getCompletedTasksByDay(){
        $taskDtls = $this->getFileInfo(Configure::read('GET_COMPLETED_TASKS_PER_DAY'));
        return json_decode($taskDtls);
    }
    
}
