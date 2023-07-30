<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Information Controller
 *
 * @property \App\Model\Table\InformationTable $Information
 *
 * @method \App\Model\Entity\Information[] paginate($object = null, array $settings = [])
 */
class AdminInformationController extends AppController
{
    
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->viewBuilder()->layout('admin');
                                           
    }


    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        // Даем доступы к страницам        
    }     

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index(){
        
        $info_table = TableRegistry::get('Information');
        
        $information = $info_table->find()->first();

        $users_table = TableRegistry::get('Users');
        
        $id = $this->Auth->user('id');
        $user = $users_table->get($id);                

        
        $staff = $users_table->getAllStaff();
        

        $this->set(compact('information', 'user', 'staff'));
        $this->set('_serialize', ['information']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null){
        
        $info_table = TableRegistry::get('Information');        
        
        $information = $info_table->get($id);

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
            
            
        $file1 = $this->request->data('img1');
        $data = $this->request->data();
        //Debug($file);
            if(isset($file1['name']) && $file1['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file1, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
                  
              
                    $information->index_img = $this->Support->customResizeImg($file1,
                                                                    $this->request->data('x_top1'),
                                                                    $this->request->data('y_top1'), 
                                                                    1920, 
                                                                    920,
                                                                    $this->request->data('w_top1'),
                                                                    $this->request->data('h_top1')
                                                                ); 
                                                                
                    //debug($information->back);
                    //exit();                                            
                    if($data['last_img1'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img1']);
                    }                  
                
                }
            }else{
                unset($file1);
                if(isset($data['last_img1'])){
                    $information->index_img = $data['last_img1'];
                }                
               
            }                      
            
        $file2 = $this->request->data('img2');
        //Debug($file);
            if(isset($file2['name']) && $file2['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file2, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
                  
              
                    $information->back2 = $this->Support->customResizeImg($file2,
                                                                    $this->request->data('x_top2'),
                                                                    $this->request->data('y_top2'), 
                                                                    1920, 
                                                                    800,
                                                                    $this->request->data('w_top2'),
                                                                    $this->request->data('h_top2')
                                                                ); 
                                                                
                    //debug($information->back);
                    //exit();                                            
                    if($data['last_img2'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img2']);
                    }                  
                
                }
            }else{
                unset($file2);
                if(isset($data['last_img2'])){
                    $information->back2 = $data['last_img2'];
                }                
               
            } 
            
        $file3 = $this->request->data('img3');
        //Debug($file);
            if(isset($file3['name']) && $file3['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file3, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
                  
              
                    $information->back3 = $this->Support->customResizeImg($file3,
                                                                    $this->request->data('x_top3'),
                                                                    $this->request->data('y_top3'), 
                                                                    1920, 
                                                                    800,
                                                                    $this->request->data('w_top3'),
                                                                    $this->request->data('h_top3')
                                                                ); 
                                                                
                    //debug($information->back);
                    //exit();                                            
                    if($data['last_img3'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img3']);
                    }                  
                
                }
            }else{
                unset($file3);
                if(isset($data['last_img3'])){
                    $information->back3 = $data['last_img3'];
                }                
               
            }        
            
        $file4 = $this->request->data('img4');
        //Debug($file);
            if(isset($file4['name']) && $file4['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file4, 5242880);
                //debug($can_save);
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
                  
              
                    $information->back4 = $this->Support->customResizeImg($file4,
                                                                    $this->request->data('x_top4'),
                                                                    $this->request->data('y_top4'), 
                                                                    1920, 
                                                                    800,
                                                                    $this->request->data('w_top4'),
                                                                    $this->request->data('h_top4')
                                                                ); 
                                                                
                    //debug($information->back);
                    //exit();                                            
                    if($data['last_img4'] != ''){
                        // Удаляем изображения
                        unlink(WWW_ROOT.'img/upload/'.$data['last_img4']);
                    }                  
                
                }
            }else{
                unset($file4);
                if(isset($data['last_img4'])){
                    $information->back4 = $data['last_img4'];
                }                
               
            }                             
            
            
            
            
            if ($info_table->save($information)) {
                $this->Flash->success('Данные компании изменены');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка, попробуйте еще раз');
        }
        $this->set(compact('information'));
        $this->set('_serialize', ['information']);
    }
    
    public function editAdmin(){

        $users_table = TableRegistry::get('Users');
        
        $id = $this->Auth->user('id');
        //debug($id);
        if(!$id){
            return $this->redirect(['controller' => 'index', 'action' => 'index']);
            //throw new NotFoundException(__('Запрашиваемая страница не найдена'));
        }        
        
        $user = $users_table->get($id);
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $users_table->patchEntity($user, $this->request->getData());
            if ($users_table->save($user)) {
                $this->Flash->success(__('Ваши данные отредактированы.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка редактирования профиля.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function addUser(){

        $staff_table = TableRegistry::get('Users');
        
        $new_staff = $staff_table->newEntity();
        
        
        if($this->request->is(['post'])){
            
            if($this->request->data('username') == '' || $this->request->data('name') == '' || $this->request->data('password') == ''){
                $this->Flash->error(__('Все поля должны быть заполнены.'));
                return $this->redirect($this->referer());                
            }
            
            $new_staff = $staff_table->patchEntity($new_staff, $this->request->data);
            
            $new_staff->status = '1';
            if ($staff_table->save($new_staff)) {
                $this->Flash->success(__('Новый сотрудник успешно создан.'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Ошибка создания сотрудника.'));
                return $this->redirect($this->referer());                
            }

        }
        

        //$this->set(compact('uri_addr'));
    } 
    
    public function editUser($staff_id = null){
        
        $staff_table = TableRegistry::get('Users');
        
        $staff_user = $staff_table->get($staff_id);
        
        if($staff_user->role == 'admin' || $staff_user->role == 'manager' || $staff_user->role == 'redactor'){            
            
       
            if ($this->request->is(['post', 'put'])) {
    
                if($this->request->data('username') == '' || $this->request->data('name') == '' || $this->request->data('password') == ''){
                    $this->Flash->error(__('Все поля должны быть заполнены.'));
                    return $this->redirect($this->referer());                
                }
    
                
                
                    $staff_table->patchEntity($staff_user, $this->request->data);
                    if ($staff_table->save($staff_user)) {
                        $this->Flash->success(__('Данные на сотрудника отредактированы.'));
                        return $this->redirect(['action' => 'index']);
                    }else{
                        $this->Flash->error(__('Ошибка редактирования сотрудника.'));
                        return $this->redirect($this->referer());                
                    }
                
                
            }        
        }else{
                $this->Flash->error(__('Нет такого сотрудника.'));
                return $this->redirect(['action' => 'index']);                
        }         


        $this->set(compact('staff_user'));         

    }           

    
    public function deleteUser($staff_id = null){
        $this->request->allowMethod(['post', 'delete']);
        $staff_table = TableRegistry::get('Users');
        
        $staff_user = $staff_table->get($staff_id);
        if ($staff_table->delete($staff_user)) {
            $this->Flash->success('Пользователь удален');
        } else {
            $this->Flash->error('Ошибка удаления');
        }

        return $this->redirect(['action' => 'index']);        
    }
    
}
