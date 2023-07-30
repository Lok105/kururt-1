<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\Cache\Cache;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 *
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PagesController extends AppController{
    
    
    public function initialize(){

        parent::initialize();
       
        
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $this->Auth->allow(['index', 'view']);
        
       
    }    
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentServices']
        ];
        $services = $this->Pages->find()->where(['parent_id' => '0'])->order(['position' => 'asc']);
        
        $countServices = 0;
        foreach($services as $s){
            $countServices++;
        }
        
        if($countServices == 0){
            $services = null;
        }        
        
        $info_table = TableRegistry::get('Information');
        $information = $info_table->get(2);
        if($information->h1){
            $bbackh1 = $information->h1;
        }else{
            $bbackh1 = 'Услуги';
        }
        if($information->back){
            $bback = $information->back;
        }else{
            $bback = '7.jpg';
        }        

        $this->set(compact('services', 'information', 'bbackh1', 'bback', 'countServices'));
    }

    /**
     * View method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($alias = null){
        
        
        $service = $this->Pages->find()->where(['alias' => $alias])->first();
        //debug($service);
        if(!$service) {
            throw new NotFoundException(__('Запрашиваемая страница не найдена'));
        }        
        
        if($service->parent_id == 0){
            $crumbs['one']['title'] = $service->menu_title;
            $crumbs['one']['alias'] = $service->alias;            
        }else{
            $parentOne = $this->Pages->find()->select(['id', 'parent_id', 'alias', 'menu_title'])->where(['id' => $service->parent_id])->first();
            if($parentOne->parent_id == 0){
                $crumbs['one']['title'] = $parentOne->menu_title;
                $crumbs['one']['alias'] = $parentOne->alias; 
                $crumbs['two']['title'] = $service->menu_title;
                $crumbs['two']['alias'] = $service->alias;                                
            }else{
                $parentTwo = $this->Pages->find()->select(['id', 'parent_id', 'alias', 'menu_title'])->where(['id' => $parentOne->parent_id])->first();
                $crumbs['one']['title'] = $parentTwo->menu_title;
                $crumbs['one']['alias'] = $parentTwo->alias;
                $crumbs['two']['title'] = $parentOne->menu_title;
                $crumbs['two']['alias'] = $parentOne->alias; 
                $crumbs['three']['title'] = $service->menu_title;
                $crumbs['three']['alias'] = $service->alias;                
            }
        }
        
        $services = $this->Pages->find()->where(['parent_id' => $service->id, 'published' => '1'])->order(['position' => 'asc']);
        
        $countServices = 0;
        foreach($services as $s){
            $countServices++;
        }
        
        if($countServices == 0){
            $services = null;
        }
        
        $info_table = TableRegistry::get('Information');
        $information = $info_table->get(2);
        if($service->h1){
            $bbackh1 = $service->h1;
        }else{
            if($service->menu_title){
                $bbackh1 = $service->menu_title;
            }else{
                $bbackh1 = 'Услуги';
            }
        }
        if($service->back){
            $bback = $service->back;
        }else{
            if($information->back){
                $bback = $information->back;
            }else{
                $bback = '7.jpg';
            }
        }         
        

        $this->set(compact('service', 'services', 'information', 'bbackh1', 'bback', 'countServices', 'crumbs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $service = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $service = $this->Pages->patchEntity($service, $this->request->getData());
            if ($this->Pages->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $parentServices = $this->Pages->ParentServices->find('list', ['limit' => 200]);
        $this->set(compact('service', 'parentServices'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $service = $this->Pages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $service = $this->Pages->patchEntity($service, $this->request->getData());
            if ($this->Pages->save($service)) {
                $this->Flash->success(__('The service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The service could not be saved. Please, try again.'));
        }
        $parentServices = $this->Pages->ParentServices->find('list', ['limit' => 200]);
        $this->set(compact('service', 'parentServices'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $service = $this->Pages->get($id);
        if ($this->Pages->delete($service)) {
            $this->Flash->success(__('The service has been deleted.'));
        } else {
            $this->Flash->error(__('The service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}