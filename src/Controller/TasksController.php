<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Tasks Controller
 *
 *
 * @method \App\Model\Entity\Task[] paginate($object = null, array $settings = [])
 */
class TasksController extends AppController {

    public function initialize() {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        // For returning all the tasks
        $allTasks = $this->getFileInfo(Configure::read('GET_ALL_TASKS'));
        $this->success['data'] = json_decode($allTasks);
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Returns tasks count
     * @return type
     */
    public function fetchTasksByStatus() {
        $taskDtls = $this->getFileInfo(Configure::read('GET_TASKS_BY_STATUS'));
        $this->success['data'] = json_decode($taskDtls);
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Returns tasks count
     * @return type
     */
    public function getCompletedTasksByDay() {
        $taskDtls = $this->getFileInfo(Configure::read('GET_COMPLETED_TASKS_PER_DAY'));
        $this->success['data'] = json_decode($taskDtls);
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
