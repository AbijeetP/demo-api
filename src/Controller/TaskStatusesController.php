<?php

namespace App\Controller;

use App\Controller\AppController;

require_once __DIR__ . '/../Model/Table/TasksStatusesTable.php';

/**
 * TaskStatuses Controller
 *
 *
 * @method \App\Model\Entity\TaskStatus[] paginate($object = null, array $settings = [])
 */
class TaskStatusesController extends AppController {
    
    public function initialize() {
        parent::initialize();
        $this->TasksStatuses = new \App\Model\Table\TaskStatusesTable();
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $arrTaskStatuses = $this->TasksStatuses->getAllTaskStatuses();
        $this->success['data'] = $arrTaskStatuses;
        return $this->sendJSONResponse($this->success);
    }

    /**
     * View method
     *
     * @param string|null $id Task Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Edit method
     *
     * @param string|null $id Task Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        return $this->sendJSONResponse($this->success);
    }

}
