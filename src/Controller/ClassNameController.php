<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ClassName Controller
 *
 * @property \App\Model\Table\ClassNameTable $ClassName
 */
class ClassNameController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'ClassName.id' => 'asc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $className = $this->ClassName->find('all', [
                // 'conditions' => ['ClassName.status !=' => 99],
                // 'contain' => ['Classes', 'Faculties']
        ]);
        $this->set('className', $this->paginate($className));
        $this->set('_serialize', ['className']);
    }

    /**
     * View method
     *
     * @param string|null $id Class Name id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $className = $this->ClassName->get($id, [
                // 'contain' => ['Classes', 'Faculties']
        ]);
        $this->set('className', $className);
        $this->set('_serialize', ['className']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $time = time();
        $className = $this->ClassName->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
//            $data['create_by'] = $user['id'];
//            $data['create_date'] = $time;
            $className = $this->ClassName->patchEntity($className, $data);
            if ($this->ClassName->save($className)) {
                $this->Flash->success('The class name has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The class name could not be saved. Please, try again.');
            }
        }
        //$classes = $this->ClassName->Classes->find('list', ['conditions' => ['status' => 1]]);
        // $faculties = $this->ClassName->Faculties->find('list', ['conditions' => ['status' => 1]]);
        //$this->set(compact('className', 'classes', 'faculties'));
        $this->set(compact('className'));

        $this->set('_serialize', ['className']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Class Name id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $time = time();
        $className = $this->ClassName->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
//            $data['update_by'] = $user['id'];
//            $data['update_date'] = $time;
            $className = $this->ClassName->patchEntity($className, $data);
            if ($this->ClassName->save($className)) {
                $this->Flash->success('The class name has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The class name could not be saved. Please, try again.');
            }
        }
//        $classes = $this->ClassName->Classes->find('list', ['conditions' => ['status' => 1]]);
//        $faculties = $this->ClassName->Faculties->find('list', ['conditions' => ['status' => 1]]);
//        $this->set(compact('className', 'classes', 'faculties'));
        $this->set(compact('className'));

        $this->set('_serialize', ['className']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Class Name id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $className = $this->ClassName->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
//        $data['updated_by'] = $user['id'];
//        $data['updated_date'] = time();
//        $data['status'] = 99;
        $className = $this->ClassName->patchEntity($className, $data);
        if ($this->ClassName->save($className)) {
            $this->Flash->success('The class name has been deleted.');
        } else {
            $this->Flash->error('The class name could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
