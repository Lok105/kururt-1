<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;


class NewsController extends AppController{
    
    public $paginate = [
        'limit' => 12,
        'order' => [
            'News.created' => 'desc'    
        ]
    ];    
    
    public function initialize(){

        parent::initialize();
        $this->loadComponent('Paginator');
       
        
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
    public function index(){
        
        
        $this->paginate = [
            'contain' => [],
            'limit' => 12,
            'order' => ['News.created' => 'desc']
        ];
        
        $news = $this->paginate($this->News->find()->where(['published' => '1']));
        
        $countNews = 0;
        foreach($news as $s){
            $countNews++;
        }
        
        if($countNews == 0){
            $news = null;
        }        
        
        $info_table = TableRegistry::get('Information');
        $information = $info_table->get(3);
        if($information->h1){
            $bbackh1 = $information->h1;
        }else{
            $bbackh1 = 'Новости';
        }
        if($information->back){
            $bback = $information->back;
        }else{
            $bback = 'news.jpg';
        }        

        $this->set(compact('news', 'information', 'bbackh1', 'bback', 'countNews'));
    } 
    
    
    public function view($alias = null){
        
        
        $new = $this->News->find()->where(['alias' => $alias])->first();
        //debug($new);
        if(!$new) {
            throw new NotFoundException(__('Запрашиваемая страница не найдена'));
        }       
        
        $info_table = TableRegistry::get('Information');
        $information = $info_table->get(3);
        if($new->h1){
            $bbackh1 = $new->h1;
        }else{
            if($new->menu_title){
                $bbackh1 = $new->menu_title;
            }else{
                $bbackh1 = 'Новости';
            }
        }
        if($new->back){
            $bback = $new->back;
        }else{
            if($information->back){
                $bback = $information->back;
            }else{
                $bback = 'news.jpg';
            }
        } 
        
        $news = $this->News->find()->where(['created <' => $new->created])->limit(3);
        
        $countNews = 0;
        foreach($news as $n){
            $countNews++;
        }
        if($countNews == 0){
            $news = null;
        }        
        

        $this->set(compact('new','information', 'bbackh1', 'bback', 'news', 'countNews'));
    }          
    

}