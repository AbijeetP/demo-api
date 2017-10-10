<?php

namespace App\Model\Table;
use Cake\Core\Configure;

class TaskStatusesTable extends AppTable {
    
    /**
     * Returns task statuses details.
     * @return array
     */
    public function getAllTaskStatuses(){
        $taskStatus = $this->getFileInfo(Configure::read('GET_ALL_TASK_STATUSES'));
        return json_decode($taskStatus);
    }
    
}