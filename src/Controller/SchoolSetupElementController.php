<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * SoftSchoolSetupElement Controller
 *
 * @property \App\Model\Table\SoftSchoolSetupElementTable $SoftSchoolSetupElement
 */
class SchoolSetupElementController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
        //     'SoftSchoolSetupElement.id' => 'desc'
        ]
    ];

    //public $column_prefix = 'TBL30_';

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $softSchoolSetupElement = $this->SchoolSetupElement->find('all', [
                // 'conditions' => ['SchoolSetupElement.TBL30_STATUS !=' => 99]
        ]);
        $this->set('softSchoolSetupElement', $this->paginate($softSchoolSetupElement));
        $this->set('_serialize', ['softSchoolSetupElement']);
    }

    /**
     * View method
     *
     * @param string|null $id Soft School Setup Element id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $softSchoolSetupElement = $this->SchoolSetupElement->get($id, [
            'contain' => []
        ]);
        $this->set('softSchoolSetupElement', $softSchoolSetupElement);
        $this->set('_serialize', ['softSchoolSetupElement']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $date = date('Y-m-d');
        $softSchoolSetupElement = $this->SchoolSetupElement->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;

            //$data['create_by'] = $user['id'];
            $data['TBL30_ENTRY_DATE'] = $date;

            $softSchoolSetupElement = $this->SchoolSetupElement->patchEntity($softSchoolSetupElement, $data);
            if ($this->SchoolSetupElement->save($softSchoolSetupElement)) {
                $this->Flash->success('The soft school setup element has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The soft school setup element could not be saved. Please, try again.');
            }
        }
        $this->set(compact('softSchoolSetupElement'));
        $this->set('_serialize', ['softSchoolSetupElement']);
    }

    public function ajax($element_type, $element_parent_id = null) {
        $this->autoRender = FALSE;
        if (h($element_type) == 'shift' || h($element_type) == 'medium' ) {
            $res = $this->SchoolSetupElement->find('all', array('fields' => array('TBL30_ELEMENT_DATA', 'TBL30_ELEMENT_ID'),
                'conditions' => array('TBL30_ELEMENT_TYPE' => 'campus')));

            $this->response->body(json_encode($res));
        }
        if (h($element_type) == 'campus_child') {
            $res = $this->SchoolSetupElement->find('all', array('fields' => array('TBL30_ELEMENT_DATA',
                    'TBL30_ELEMENT_ID', 'TBL30_ELEMENT_PARENT', 'TBL30_ELEMENT_TYPE'),
                'conditions' => array('TBL30_ELEMENT_PARENT' => $element_parent_id)));
            $this->response->body(json_encode($res));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Soft School Setup Element id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $time = time();
        $softSchoolSetupElement = $this->SchoolSetupElement->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            //$data['update_by'] = $user['id'];
            // $data['update_date'] = $time;
            $softSchoolSetupElement = $this->SchoolSetupElement->patchEntity($softSchoolSetupElement, $data);
            if ($this->SchoolSetupElement->save($softSchoolSetupElement)) {
                $this->Flash->success('The soft school setup element has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The soft school setup element could not be saved. Please, try again.');
            }
        }
        $this->set(compact('softSchoolSetupElement'));
        $this->set('_serialize', ['softSchoolSetupElement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Soft School Setup Element id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $softSchoolSetupElement = $this->SchoolSetupElement->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        //$data['updated_by'] = $user['id'];
        //$data['updated_date'] = time();
        //$data['status'] = 99;
        // $softSchoolSetupElement = $this->SoftSchoolSetupElement->patchEntity($softSchoolSetupElement, $data);
        if ($this->SchoolSetupElement->delete($softSchoolSetupElement)) {
            $this->Flash->success('The soft school setup element has been deleted.');
        } else {
            $this->Flash->error('The soft school setup element could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
