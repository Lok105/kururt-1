<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Staffers Controller
 *
 * @property \App\Model\Table\StaffersTable $Staffers
 *
 * @method \App\Model\Entity\Staffer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminStaffersController extends AppController{
    
    public $paginate = [
        'limit' => 30,
        'order' => [
            'Staffers.created' => 'desc'    
        ]
    ];
    
    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('admin');       
        
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $role = $this->Auth->user('role');
        
        if (isset($role) && ($role === 'manager' || $role === 'redactor')) {
            
            $this->Auth->allow(['index', 'add', 'edit', 'delete']);

        }  

    }         

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $staffers = $this->paginate($this->AdminStaffers);

        $this->set(compact('staffers'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){

        $staffer = $this->AdminStaffers->newEntity();
        if ($this->request->is('post')) {
            $staffer = $this->AdminStaffers->patchEntity($staffer, $this->request->getData());
            
            $file = $this->request->data('img');
            //debug($file);
            //exit();
            
            $data = $this->request->data();

            
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
              
                    $staffer->img = $this->Support->customResizeImg($file,
                                                                    $this->request->data('x_top'),
                                                                    $this->request->data('y_top'), 
                                                                    1280, 
                                                                    920,
                                                                    $this->request->data('w_top'),
                                                                    $this->request->data('h_top')
                                                                );                    
                    
                }  
            }else{
                unset($file);
            }            
            
            
            if ($this->AdminStaffers->save($staffer)) {
                $this->Flash->success('Сотрудник добавлен');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка добавления сотрудника');
        }
        
        
        $this->set(compact('staffer'));
        $this->set('_serialize', ['staffer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Staffer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null){
        
        $staffer = $this->AdminStaffers->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $staffer = $this->AdminStaffers->patchEntity($staffer, $this->request->getData());
            
            $data = $this->request->getData();
            $file = $this->request->getData('img');

            
            //debug($data);
            //exit();
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
              
                    $staffer->img = $this->Support->customResizeImg($file, 
                                                                    $this->request->getData('x_top'),
                                                                    $this->request->getData('y_top'), 
                                                                    1280, 
                                                                    920,
                                                                    $this->request->getData('w_top'),
                                                                    $this->request->getData('h_top')
                                                                );
                                                                
                    if($data['last_img'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img']);
                    }                                                                                    
                    
                }  
            }else{
                unset($file);
                if(isset($data['last_img'])){
                    $staffer->img = $data['last_img'];
                }                
            }             
            
            
            //debug($articles);
            if ($this->AdminStaffers->save($staffer)) {
                $this->Flash->success('Карточка сотрудника отредактирована');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка редактирования');
        }
        
     
        
        
        $this->set(compact('staffer'));
        $this->set('_serialize', ['staffer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Staffer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        

        $this->request->allowMethod(['post', 'delete']);
        $staffer = $this->AdminStaffers->get($id);
        $img = $staffer->img;
        if ($this->AdminStaffers->delete($staffer)) {
            
            if($img && $img != ''){
                unlink(WWW_ROOT.'img/upload/'.$img);
            }              
            
            $this->Flash->success('Карточка сотрудника удалена');
        } else {
            $this->Flash->error('Ошибка удаления карточки сотрудника');
        }

        return $this->redirect(['action' => 'index']);
    }
}
