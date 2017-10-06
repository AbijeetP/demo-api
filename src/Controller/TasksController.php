<?php

namespace App\Controller;

use App\Controller\AppController;

require_once __DIR__ . '/../Model/Table/TasksTable.php';

/**
 * Tasks Controller
 *
 *
 * @method \App\Model\Entity\Task[] paginate($object = null, array $settings = [])
 */
class TasksController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Tasks = new \TasksTable();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        // For returning all the tasks
        $arrTasks = $this->Tasks->getAllTasks();
        $this->success['data'] = $arrTasks;
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Returns tasks count
     * @return type
     */
    public function fetchTasksByStatus() {
        $arrTasks = $this->Tasks->getTasksByStatus();
        $this->success['data'] = $arrTasks;
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Returns tasks count
     * @return type
     */
    public function getCompletedTasksByDay() {
        $arrTasks = $this->Tasks->getCompletedTasksByDay();
        $this->success['data'] = $arrTasks;
        return $this->sendJSONResponse($this->success);
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
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
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        return $this->sendJSONResponse($this->success);
    }

}
