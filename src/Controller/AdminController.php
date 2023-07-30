<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

class AdminController extends AppController{
    
/*    public $paginate = [
        'limit' => 10,
        'order' => [
            'Companies.created' => 'asc',
            'Companies.company_name' => 'asc'
        ]       
    ];*/


    public function initialize(){
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Support');
        $this->viewBuilder()->layout('admin');
                                           
    }


    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        // Даем доступы к страницам 
        
        $role = $this->Auth->user('role');
        
        if (isset($role) && ($role === 'admin' || $role === 'manager' || $role === 'redactor')) {
            
            $this->Auth->allow(['getAlias']);

        }                
    }

    public function main(){


    }
    
    public function getAlias(){
        $title = $this->request->getData('title');
        
        $alias = $this->Support->translit($title);


        //$page_text_table = TableRegistry::get('AdminCategories');        
        // Проверяем алиас на уникальность
        //$articles_table = TableRegistry::get('Articles');
        //$alias = $this->AdminNews->checkAlias($alias);
        
        $this->set(compact('alias'));
    }        

}