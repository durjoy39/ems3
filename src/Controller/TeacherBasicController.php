<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * TeacherBasic Controller
 *
 * @property \App\Model\Table\TeacherBasicTable $TeacherBasic
 */
class TeacherBasicController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'TeacherBasic.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $teacherBasic = $this->TeacherBasic->find('all', [
           // 'conditions' => ['TeacherBasic.status !=' => 99],
                // 'contain' => ['Nationals', 'InstituteTeachers']
        ]);
        $this->set('teacherBasic', $this->paginate($teacherBasic));
        $this->set('_serialize', ['teacherBasic']);
    }

    /**
     * View method
     *
     * @param string|null $id Teacher Basic id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $teacherBasic = $this->TeacherBasic->get($id, [
                //  'contain' => ['Nationals', 'InstituteTeachers']
        ]);
        $this->set('teacherBasic', $teacherBasic);
        $this->set('_serialize', ['teacherBasic']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Auth->user();
        $time = time();
        $teacherBasic = $this->TeacherBasic->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
           // $data['create_by'] = $user['id'];
           /// $data['create_date'] = $time;
            $teacherBasic = $this->TeacherBasic->patchEntity($teacherBasic, $data);
            if ($this->TeacherBasic->save($teacherBasic)) {
                $this->Flash->success('The teacher basic has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The teacher basic could not be saved. Please, try again.');
            }
        }
        // $nationals = $this->TeacherBasic->Nationals->find('list', ['conditions' => ['status' => 1]]);
        //$instituteTeachers = $this->TeacherBasic->InstituteTeachers->find('list', ['conditions' => ['status' => 1]]);
        // $this->set(compact('teacherBasic', 'nationals', 'instituteTeachers'));
        $this->set(compact('teacherBasic'));
        $this->set('_serialize', ['teacherBasic']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher Basic id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $time = time();
        $teacherBasic = $this->TeacherBasic->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            //$data['update_by'] = $user['id'];
          //  $data['update_date'] = $time;
            $teacherBasic = $this->TeacherBasic->patchEntity($teacherBasic, $data);
            if ($this->TeacherBasic->save($teacherBasic)) {
                $this->Flash->success('The teacher basic has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The teacher basic could not be saved. Please, try again.');
            }
        }
        //$nationals = $this->TeacherBasic->Nationals->find('list', ['conditions' => ['status' => 1]]);
        // $instituteTeachers = $this->TeacherBasic->InstituteTeachers->find('list', ['conditions' => ['status' => 1]]);
        //   $this->set(compact('teacherBasic', 'nationals', 'instituteTeachers'));
        $this->set(compact('teacherBasic'));
        $this->set('_serialize', ['teacherBasic']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher Basic id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $teacherBasic = $this->TeacherBasic->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
       // $data['updated_by'] = $user['id'];
       // $data['updated_date'] = time();
       // $data['status'] = 99;
        $teacherBasic = $this->TeacherBasic->patchEntity($teacherBasic, $data);
        if ($this->TeacherBasic->save($teacherBasic)) {
            $this->Flash->success('The teacher basic has been deleted.');
        } else {
            $this->Flash->error('The teacher basic could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
