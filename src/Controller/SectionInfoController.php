<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * SectionInfo Controller
 *
 * @property \App\Model\Table\SectionInfoTable $SectionInfo
 */
class SectionInfoController extends AppController {

    public $paginate = [
        'limit' => 15,
        'order' => [
            'SectionInfo.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $sectionInfo = $this->SectionInfo->find('all', [
            'conditions' => ['SectionInfo.status !=' => 99],
                //'contain' => ['Teachers']
        ]);
        $this->set('sectionInfo', $this->paginate($sectionInfo));
        $this->set('_serialize', ['sectionInfo']);

//        $this->loadModel('ClassInfo');
//        $class_id = $this->ClassInfo->find('all', ['fields' => 'cid'])->last()->toArray();
//
//        $cid = $class_id['cid'];
//        debug($cid);
    }

    /**
     * View method
     *
     * @param string|null $id Section Info id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Auth->user();
        $sectionInfo = $this->SectionInfo->get($id, [
                //  'contain' => ['Teachers']
        ]);
        $this->set('sectionInfo', $sectionInfo);
        $this->set('_serialize', ['sectionInfo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function ajax($element_type, $campus_id = null) {

        $this->autoRender = FALSE;
        $this->loadModel('SchoolSetupElement');
        $this->loadModel('ClassName');
        $this->loadModel('TeacherBasic');
        if (h($element_type) == 'campus_list') {
            $res = $this->SchoolSetupElement->find('all', array('fields' => array('TBL30_ELEMENT_DATA', 'TBL30_ELEMENT_ID'),
                'conditions' => array('TBL30_ELEMENT_TYPE' => 'campus')));


            $this->response->body(json_encode($res));
        }
        if (h($element_type) == 'shift_list' || h($element_type == 'medium_list')) {

            $res = $this->SchoolSetupElement->find('all', array('fields' => array('TBL30_ELEMENT_DATA',
                    'TBL30_ELEMENT_ID', 'TBL30_ELEMENT_PARENT', 'TBL30_ELEMENT_TYPE'),
                'conditions' => array('TBL30_ELEMENT_PARENT' => $campus_id)));
            $this->response->body(json_encode($res));
        }

        if ($element_type == 'class_name') {
            $class_all = $this->ClassName->find('list');
            $class_name = $class_all->toArray();
            $this->response->body(json_encode($class_name));
        }

        if ($element_type == 'teacher_info') {
            $teacher_all = $this->TeacherBasic->find('list');
            $teacher_name = $teacher_all->toArray();
            $this->response->body(json_encode($teacher_name));
        }
    }

    public function saveclassinfo() {
        $this->autoRender = FALSE;
        $edit = $this->request->data['edit'];
        $sid = $this->request->data['section_id'];
        echo $sid;
        if ($edit == 'false') {


            $class_info = TableRegistry::get('ClassInfo');
            $class_det = $class_info->newEntity();
            //$this->loadModel('SectionInfo');
            //$this->loadModel('ClassInfo');


            if ($this->request->is('post')) {
                $class_det['class_campus'] = $this->request->data['campus_name'];
                $class_det['class_shift_info'] = $this->request->data['shift_name'];
                $class_det['class_medium'] = $this->request->data['medium_name'];
                $class_det['class_name'] = $this->request->data['class_name'];
                $class_det['teacher_id'] = $this->request->data['teacher_id'];

                $data['section_name'] = $this->request->data['section_name'];
                $data['status'] = $this->request->data['status'];
                //$data['extra_info'] = $this->request->data['extra_info'];

                try {
                    $this->loadModel('SectionInfo');
                    $this->loadModel('ClassInfo');
                    $class_info->save($class_det);

                    $class_id = $this->ClassInfo->find('all', ['fields' => 'cid'])->last()->toArray();
                    $cid = $class_id['cid'];

                    $data['cid'] = $cid;
                    $sectionTable = TableRegistry::get('SectionInfo');
                    $sectionInfo = $this->SectionInfo->newEntity();
                    $sectionInfo = $this->SectionInfo->patchEntity($sectionInfo, $data);
                    $this->SectionInfo->save($sectionInfo);
                } catch (Exception $e) {
                    echo $e->getMressage() . '</br>';
                    echo $e->getCode();
                }
            }
        } if ($edit == 'true') {

            $this->loadModel('SectionInfo');

            if ($this->request->is('post')) {
                $class_det['class_campus'] = $this->request->data['campus_name'];
                $class_det['class_shift_info'] = $this->request->data['shift_name'];
                $class_det['class_medium'] = $this->request->data['medium_name'];
                $class_det['class_name'] = $this->request->data['class_name'];
                $class_det['teacher_id'] = $this->request->data['teacher_id'];


                $class_info = TableRegistry::get('ClassInfo');
                $sectionTable = TableRegistry::get('SectionInfo');

                $section_data = $sectionTable->get($sid);
                $cid = $section_data['cid'];


                $query_class = $class_info->query();
                $query_class->update()
                        ->set(['class_campus' => $class_det['class_campus'],
                            'class_shift_info' => $class_det['class_shift_info'],
                            'class_medium' => $class_det['class_medium'],
                            'class_name' => $class_det['class_name'],
                            'teacher_id' => $class_det['teacher_id']
                        ])
                        ->where(['cid' => $cid])
                        ->execute();
            }
        }
    }

    public function add() {

        $user = $this->Auth->user();
        $time = time();
        $this->loadModel('ClassInfo');
//        $sectionInfo = $this->SectionInfo->newEntity();
//        if ($this->request->is('post')) {
//
//            $data = $this->request->data;
//            $data['create_by'] = $user['id'];
//            $data['create_date'] = $time;
//            $sectionInfo = $this->SectionInfo->patchEntity($sectionInfo, $data);
//            if ($this->SectionInfo->save($sectionInfo)) {
//                $this->Flash->success('The section info has been saved.');
//                return $this->redirect(['action' => 'index']);
//            } else {
//                $this->Flash->error('The section info could not be saved. Please, try again.');
//            }
//        }
        $this->set(compact('sectionInfo'));
        $this->set('_serialize', ['sectionInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Section Info id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Auth->user();
        $time = time();

        $sectionInfo = $this->SectionInfo->get($id, [
            'contain' => []
        ]);
        // debug($sectionInfo);
        $this->loadModel('ClassInfo');
        $this->loadModel('SchoolSetupElement');

        //  debug($class_info['class_campus']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['cid'] = $sectionInfo['cid'];
            $sectionInfo = $this->SectionInfo->patchEntity($sectionInfo, $data);
            if ($this->SectionInfo->save($sectionInfo)) {
                $this->Flash->success('The section info has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The section info could not be saved. Please, try again.');
            }
        }
        // debug($sectionInfo);
        $class_info = $this->ClassInfo->find('all', [
                    'conditions' => ['ClassInfo.cid' => $sectionInfo['cid']]
                ])->first()->toArray();
        // $teachers = $this->SectionInfo->Teachers->find('list', ['conditions'=>['status'=>1]]);
        $shift_options = $this->SchoolSetupElement->find('all', array('fields' => array('TBL30_ELEMENT_DATA',
                'TBL30_ELEMENT_ID', 'TBL30_ELEMENT_PARENT', 'TBL30_ELEMENT_TYPE'),
            'conditions' => array('TBL30_ELEMENT_PARENT' => '')))->toArray();

        debug($shift_options);
        $this->set('class_campus', $class_info['class_campus']);
        $this->set('section_id', $id);
        $this->set('class_shift_name', $class_info['class_shift_info']);
        $this->set('medium_info', $class_info['class_medium']);
        $this->set('class_name', $class_info['class_name']);
        $this->set('teacher_id', $class_info['teacher_id']);
        //$this->set('status', $class_info['status']);


        $this->set('shift_options', $shift_options);
        $this->set(compact('sectionInfo', 'class_info'));
        $this->set('_serialize', ['sectionInfo', 'class_info']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Section Info id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {

        $sectionInfo = $this->SectionInfo->get($id);
        $cid = $sectionInfo['cid'];
        $class_info = TableRegistry::get('ClassInfo');

        $user = $this->Auth->user();
        $data = $this->request->data;
        /* $data['updated_by'] = $user['id'];
          $data['updated_date'] = time();
          $data['status'] = 99; */
        //  $sectionInfo = $this->SectionInfo->patchEntity($sectionInfo, $data);
        if ($this->SectionInfo->delete($sectionInfo)) {

            $query = $class_info->query();
            $query->delete()
                    ->where(['cid' => $cid])
                    ->execute();

            $this->Flash->success('The section info has been deleted.');
        } else {
            $this->Flash->error('The section info could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

}
