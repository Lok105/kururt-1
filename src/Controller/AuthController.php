<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;


class AuthController extends AppController{


    public function initialize(){
        
               
        
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $this->Auth->allow(['login', 'logout']);
        
       
    }



    public function login(){

        $this->loadModel('Users');
        

        // Если пришли данные авторизации или регистрации
        if($this->request->is('post')){
            //debug($this->request->data);
                        
                
            $user = $this->Auth->identify();
            //debug($user);        
            if ($user) {
                
               
                $this->Auth->setUser($user);                     
                return $this->redirect($this->Auth->redirectUrl());

            }
                $this->Flash->error(__('Не правильные логин или пароль. Попробуйте еще раз'));
                return $this->redirect($this->referer());

      

            $this->set('user', $user);
        }
        
            //$page_text_table = TableRegistry::get('PagesTexts');
            
            //$meta = $page_text_table->getPageText('/auth/login');       
        
            //$this->set(compact('meta'));
            
    }
    
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
    

    
           
}

