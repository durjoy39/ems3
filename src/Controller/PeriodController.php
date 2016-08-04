<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Period Controller
 *
 * @property \App\Model\Table\PeriodTable $Period
 */
class PeriodController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $period = $this->paginate($this->Period);

        $this->set(compact('period'));
        $this->set('_serialize', ['period']);
    }

    /**
     * View method
     *
     * @param string|null $id Period id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $period = $this->Period->get($id, [
            'contain' => []
        ]);

        $this->set('period', $period);
        $this->set('_serialize', ['period']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $time = time();
       // echo "<pre>";print_r($user);die();
        $period = $this->Period->newEntity();
        if ($this->request->is('post')) {
            $period = $this->Period->patchEntity($period, $this->request->data);
            $period['entry_by']=$user['full_name_en'];
            $period['entry_date']=$time;
            if ($this->Period->save($period)) {
                $this->Flash->success(__('The period has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The period could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('period'));
        $this->set('_serialize', ['period']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Period id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $period = $this->Period->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $period = $this->Period->patchEntity($period, $this->request->data);
            if ($this->Period->save($period)) {
                $this->Flash->success(__('The period has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The period could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('period'));
        $this->set('_serialize', ['period']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Period id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $period = $this->Period->get($id);
        if ($this->Period->delete($period)) {
            $this->Flash->success(__('The period has been deleted.'));
        } else {
            $this->Flash->error(__('The period could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
