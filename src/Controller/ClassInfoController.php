<?php

namespace App\Controller;

/**
 * ClassInfo Controller
 *
 * @property \App\Model\Table\ClassInfoTable $ClassInfo
 */
class ClassInfoController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'ClassInfo.cid' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $classInfo = $this->ClassInfo->find('all', [
            //'conditions' =>['ClassInfo.status !=' => 99],
            'contain' => ['TeacherBasic']
        ]);

        $this->loadModel('ClassName');
        $class_name_array = [];
        $class_info_array = $classInfo->toArray();

        foreach ($class_info_array as $value) {
            $class_name_array[] = $value['class_name'];
        }
        $class_name = $this->ClassName->find('list', ['conditions' => ['ClassName.id IN' => $class_name_array]]);
        $class_name_list = [];
        $class_name_list = $class_name->toArray();
        //debug($class_name_list);
        $this->set('class_name_list', $class_name_list);
        $this->set('classInfo', $this->paginate($classInfo));
        $this->set('_serialize', ['classInfo']);
    }

    /**
     * View method
     *
     * @param string|null $id Class Info id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $classInfo = $this->ClassInfo->get($id, [
            'contain' => ['TeacherBasic']
        ]);
        $this->loadModel('ClassName');
        $class_start_date = gmdate("d-m-Y", $classInfo['class_start_date']);
        $this->set('class_start_date', $class_start_date);

        $class_name = $this->ClassName->find('all', ['fields' => ['ClassName.class_name'],
            'conditions' => ['ClassName.id' => $classInfo['class_name']]])->first()->toArray();
        // debug($class_name);
        $this->set('class_name', $class_name['class_name']);
        $this->set('classInfo', $classInfo);
        $this->set('_serialize', ['classInfo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $time = time();
        $classInfo = $this->ClassInfo->newEntity();
        $this->loadModel('ClassName');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            //$data['create_by']=$user['id'];
            $data['class_start_date'] = strtotime($data['class_start_date']);
            $data['create_date'] = $time;
            $classInfo = $this->ClassInfo->patchEntity($classInfo, $data);
            if ($this->ClassInfo->save($classInfo)) {
                $this->Flash->success('The class info has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The class info could not be saved. Please, try again.');
            }
        }
        $teacherBasic = $this->ClassInfo->TeacherBasic->find('list', ['conditions' => ['delete_status' => 1]]);
        $class_all = $this->ClassName->find('list');
        $class_name = $class_all->toArray();
        $this->set(compact('classInfo', 'teacherBasic', 'class_name'));
        $this->set('_serialize', ['classInfo', 'teacherBasic', 'class_name']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Class Info id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $this->loadModel('ClassName');
        $classInfo = $this->ClassInfo->get($id, [
            'contain' => []
        ]);

        $class_start_date = gmdate('d-m-Y', $classInfo['ClassInfo']['class_start_date']);

        $this->set('class_start_date', $class_start_date);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            // $data['update_by'] = $user['id'];
            // $data['update_date'] = $time;
            // debug($data);
            $data['class_start_date'] = strtotime($data['class_start_date']);

            $classInfo = $this->ClassInfo->patchEntity($classInfo, $data);
            if ($this->ClassInfo->save($classInfo)) {
                $this->Flash->success('The class info has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The class info could not be saved. Please, try again.');
            }
        }
        //   $classInfo['ClassInfo']['status'] = $classInfo['status'];
        //debug($classInfo['status']);

        $teacherBasic = $this->ClassInfo->TeacherBasic->find('list');
        //['conditions' => ['status' => 1]
        $class_all = $this->ClassName->find('list');
        $class_name = $class_all->toArray();
        $this->set(compact('classInfo', 'teacherBasic', 'class_name'));
        $this->set('_serialize', ['classInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Class Info id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function  campusData()

    {
        $this->loadModel('SchoolSetupElement');

        $this->autoRender = false;

        $res = $this->SchoolSetupElement->find('all', ['fields' => ['SchoolSetupElement.TBL30_ELEMENT_ID',
            'SchoolSetupElement.TBL30_ELEMENT_TYPE', 'SchoolSetupElement.TBL30_ELEMENT_DATA',
            'SchoolSetupElement.TBL30_ELEMENT_PARENT'], 'conditions' => ['SchoolSetupElement.TBL30_ELEMENT_TYPE' => 'campus']
        ])->toArray();

        foreach ($res as $result) {
            
            $campus_name[] = $result['TBL30_ELEMENT_DATA'];
        }
        $this->response->body(json_encode($campus_name));


    }

    public function delete($id = null)
    {

        $classInfo = $this->ClassInfo->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        //$data['updated_by'] = $user['id'];
        ///$data['updated_date'] = time();
        //  $data['status'] = 99;
        //$classInfo = $this->ClassInfo->patchEntity($classInfo, $data);
        if ($this->ClassInfo->delete($classInfo)) {
            $this->Flash->success('The class info has been deleted.');
        } else {
            $this->Flash->error('The class info could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
