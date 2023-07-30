<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * News Controller
 *
 * @property \App\Model\Table\AdminNewsTable $News
 *
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminNewsController extends AppController{
    
    
    
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->viewBuilder()->layout('admin');
                                           
    }


    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        // Даем доступы к страницам 
        
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
    public function index(){
        
        
        $this->paginate = [
            'contain' => [],
            'limit' => 50,
            'order' => [
                'News.position' => 'desc',
                'News.created' => 'desc'    
            ]
        ];        
        $zapros = null;
        if(isset($_GET['search'])){
            //Debug($this->request->data);
            $zapros = $_GET['search'];
            $search = $_GET['search'];
            
         

            $pages = $this->paginate($this->AdminNews->find()
                ->where([
                    "MATCH(AdminNews.title, AdminNews.alias, AdminNews.h1) AGAINST(:search IN BOOLEAN MODE)" 
                ])->contain()
            ->bind(':search', $search)
            );
            $count_res = 0;
            foreach($pages as $q){
                //Debug($q);
                $count_res++;
            }
            if($count_res == 0){
                $pages = null;
            }
            //debug($clean_zap);

            
        }else{

            $pages = $this->paginate($this->AdminNews);
            
            $zapros = null;            
        }        
        
        $info_table = TableRegistry::get('Information');        
        
        $information = $info_table->get(3);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $information = $info_table->patchEntity($information, $this->request->getData());
            $information->title = $this->request->data('title');
            //debug($information);
            //exit();
            
            
        $file = $this->request->data('img');
        //Debug($file);
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
                  
              
                    $information->back = $this->Support->customResizeImg($file,
                                                                    $this->request->data('x_top'),
                                                                    $this->request->data('y_top'), 
                                                                    1920, 
                                                                    600,
                                                                    $this->request->data('w_top'),
                                                                    $this->request->data('h_top')
                                                                ); 
                                                                
                    //debug($information->back);
                    //exit();                                            
                
                
                }
            }else{
                unset($file);
               
            }    
            

            
            if ($info_table->save($information)) {
                $this->Flash->success('Данные основной страницы "Новости" изменены');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка, попробуйте еще раз');
        }        


        $this->set(compact('pages', 'zapros', 'information'));
        $this->set('_serialize', ['pages']);
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
       
        
        
        $page = $this->AdminNews->newEntity();
        if ($this->request->is('post')) {
            $page = $this->AdminNews->patchEntity($page, $this->request->getData());
            
            $file = $this->request->getData('img');
            //debug($file);
            //exit();
            
            $data = $this->request->getData();

            
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
              
                    $page->img = $this->Support->customResizeImg($file, 
                                                                    $this->request->getData('x_top'),
                                                                    $this->request->getData('y_top'), 
                                                                    400, 
                                                                    320,
                                                                    $this->request->getData('w_top'),
                                                                    $this->request->getData('h_top')
                                                                );                    
                    
                }  
            }else{
                unset($file);
            }
            
            
        $file1 = $this->request->data('img1');
        //Debug($file);
        if(isset($file1['name']) && $file1['name'] != ''){
            
            // Проверяем допустимый ли файл
            $can_save = $this->Support->mimeTypeCheck($file1, 5242880);
            //debug($can_save);
            if($can_save == true){
                // Если проверка пройдена, загружаем картинку
              
          
                $page->back = $this->Support->customResizeImg($file1,
                                                                $this->request->data('x_top1'),
                                                                $this->request->data('y_top1'), 
                                                                1920, 
                                                                600,
                                                                $this->request->data('w_top1'),
                                                                $this->request->data('h_top1')
                                                            ); 
                                                            
                //debug($information->back);
                //exit();                                            
            
            
            }
        }else{
            unset($file1);
           
        }                          
            
            
            
            if ($this->AdminNews->save($page)) {
                $this->Flash->success(__('Новость создана.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка создания новости.'));
        }
        
 
        
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null){

     
        
        $page = $this->AdminNews->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $page = $this->AdminNews->patchEntity($page, $this->request->getData());
            //debug($information);
            //exit();
            
            
        $file = $this->request->getData('img');
        $file1 = $this->request->getData('img1');
        $data = $this->request->getData();        
        //Debug($file);
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
                  
              
                    $page->img = $this->Support->customResizeImg($file,
                                                                    $this->request->data('x_top'),
                                                                    $this->request->data('y_top'), 
                                                                    400, 
                                                                    320,
                                                                    $this->request->data('w_top'),
                                                                    $this->request->data('h_top')
                                                                ); 
                                                                
                    //debug($information->back);
                    //exit();                                            
                    if($data['last_img'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img']);
                    }                
                
                }
            }else{
                unset($file);
                if(isset($data['last_img'])){
                    $page->img = $data['last_img'];
                }               
            }     
            
            

        //Debug($file);
            if(isset($file1['name']) && $file1['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file1, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
                  
              
                    $page->back = $this->Support->customResizeImg($file1,
                                                                    $this->request->data('x_top1'),
                                                                    $this->request->data('y_top1'), 
                                                                    1920, 
                                                                    920,
                                                                    $this->request->data('w_top1'),
                                                                    $this->request->data('h_top1')
                                                                ); 
                                                                
                                           
                    if($data['last_img1'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img1']);
                    }                  
                
                }
            }else{
                unset($file1);
                if(isset($data['last_img1'])){
                    $page->back = $data['last_img1'];
                }                
               
            }                      
            
            
            
            
            
            
            if ($this->AdminNews->save($page)) {
                $this->Flash->success('Новость отредактирована');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка, попробуйте еще раз');
        }
        $this->set(compact('page'));
        $this->set('_serialize', ['page']);        
        

    }

    /**
     * Delete method
     *
     * @param string|null $id Page id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null){
        $this->request->allowMethod(['post', 'delete']);
        $page = $this->AdminNews->get($id);
        $img = $page->img;
        $back = $page->back;        
        
        if ($this->AdminNews->delete($page)) {
            
            if($img && $img != ''){
                unlink(WWW_ROOT.'img/upload/'.$img);
            }   
            if($back && $back != ''){
                unlink(WWW_ROOT.'img/upload/'.$back);
            } 
                                  
            $this->Flash->success('Новость удалена');
        } else {
            $this->Flash->error('Ошибка удаления, попробуйте еще раз');
        }

        return $this->redirect(['action' => 'index']);
    }
}