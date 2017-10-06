<?php

use Cake\ORM\Table;

class TaskStatusesTable extends Table {
    
    /**
     * Returns task statuses details.
     * @return array
     */
    public function getAllTaskStatuses(){
        $arrTaskStatuses = [
            [
                'statusID'  => 1,
                'statusName' => 'Blocked'
            ],[
                'statusID'  => 2,
                'statusName' => 'Done'
            ],[
                'statusID'  => 3,
                'statusName' => 'In Progress'
            ],[
                'statusID'  => 4,
                'statusName' => 'Planned'
            ]
        ];
        return $arrTaskStatuses;
    }
    
}