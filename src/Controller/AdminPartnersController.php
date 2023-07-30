<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Slides Controller
 *
 * @property \App\Model\Table\SlidesTable $Slides
 *
 * @method \App\Model\Entity\Portfolio[] paginate($object = null, array $settings = [])
 */
class AdminPartnersController extends AppController{
    
    
    
    
    public $paginate = [
        'limit' => 30,
        'order' => [
            'Slides.created' => 'desc'    
        ]
    ];

    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('admin');       
        
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        //$this->Auth->allow(['index']);
        
       
    }    
    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $slides = $this->paginate($this->AdminPartners);

        $this->set(compact('slides'));
        $this->set('_serialize', ['slides']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
        $slide = $this->AdminPartners->newEntity();
        if ($this->request->is('post')) {
            $slide = $this->AdminPartners->patchEntity($slide, $this->request->getData());
            
            
            $file = $this->request->data('img');
            //debug($this->request->getData());
            //exit();
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
              
                    $slide->img = $this->Support->customResizeImg($file, 
                                                                    $this->request->data('x_top'),
                                                                    $this->request->data('y_top'), 
                                                                    300, 
                                                                    100,
                                                                    $this->request->data('w_top'),
                                                                    $this->request->data('h_top')
                                                                );                    
                    
                }  
            }else{
                unset($file);
            }            
            
            $slide->teg_alias = $this->Support->translit($slide->teg_title);
            
            if ($this->AdminPartners->save($slide)) {
                $this->Flash->success('Ссылка партнера создана');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка, попробуйте еще раз');
        }
        $this->set(compact('slide'));
        $this->set('_serialize', ['slide']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slide = $this->AdminPartners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slide = $this->AdminPartners->patchEntity($slide, $this->request->getData());
            
            
            $data = $this->request->data();
            $file = $this->request->data('img');
            //debug($data);
            //exit();
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
              
                    $slide->img = $this->Support->customResizeImg($file, 
                                                                    $this->request->data('x_top'),
                                                                    $this->request->data('y_top'), 
                                                                    300, 
                                                                    100,
                                                                    $this->request->data('w_top'),
                                                                    $this->request->data('h_top')
                                                                );
                                                                
                    if($data['last_img'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img']);
                    }                                                                                    
                    
                }  
            }else{
                unset($file);
                if(isset($data['last_img'])){
                    $slide->img = $data['last_img'];
                }                
            }            
            
            $slide->teg_alias = $this->Support->translit($slide->teg_title);
                        
            if ($this->AdminPartners->save($slide)) {
                $this->Flash->success('Ссылка партнера отредактирована');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка редактирования ссылки');
        }
        $this->set(compact('slide'));
        $this->set('_serialize', ['slide']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Portfolio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slide = $this->AdminPartners->get($id);
        $img_name = $slide->img;
        if ($this->AdminPartners->delete($slide)) {
            if($img_name){
                unlink(WWW_ROOT.'img/upload/'.$img_name);                
            } 
                       
            $this->Flash->success('Ссылка партнера удалена');
        } else {
            $this->Flash->error('Ошибка удаления');
        }

        return $this->redirect(['action' => 'index']);
    }
}