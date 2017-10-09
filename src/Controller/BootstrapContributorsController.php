<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;
use Cake\I18n\Date;
use Cake\Core\Configure;

/**
 * BootstrapContributors Controller
 *
 *
 * @method \App\Model\Entity\BootstrapContributor[] paginate($object = null, array $settings = [])
 */
class BootstrapContributorsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $file = new File($this->getFileNameToReadInfo());
        $contents = $file->read();
        $file->close();
        $this->success['data'] = json_decode($contents);
        return $this->sendJSONResponse($this->success);
    }

    /**
     * View method
     *
     * @param string|null $id Bootstrap Contributor id.
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
     * @param string|null $id Bootstrap Contributor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        return $this->sendJSONResponse($this->success);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bootstrap Contributor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        return $this->sendJSONResponse($this->success);
    }
    
    /**
     * File name for reading Bootstrap contributors information
     * @return string
     */
    private function getFileNameToReadInfo(){
        $objDate = new Date();
        $formattedToday = $objDate->format(Configure::read('DATE_FORMAT'));
        $formattedTomorrowday = $objDate->modify('+1 day')->format(Configure::read('DATE_FORMAT'));
        $fileName = 'uploads/contributors_' . $formattedToday . '-' . $formattedTomorrowday . '.json';
        return $fileName;
    }
}
