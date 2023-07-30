<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;


class RssController extends AppController{

    //public $components = array('RequestHandler');

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
        //$this->viewBuilder()->layout('sitemap');                             
    }



    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $this->Auth->allow(['index']);

    }
    
    public function index(){
        
        //debug($this->RequestHandler->isRss());
/*        if ($this->RequestHandler->isRss() ) {
            debug('tut');
            //$this->viewBuilder()->layout('rss');
            //$this->RequestHandler->respondAs('xml');
            
            $pages_table = TableRegistry::get('Pages');
            $pages = $pages_table->getRssInformation();            
            
            $this->set(compact('pages'));
        }else{
            $pages_table = TableRegistry::get('Pages');
            $pages = $pages_table->getRssInformation();            
            
            $this->set(compact('pages'));            //debug('tututut');
        }  */      
        

        $this->viewBuilder()->layout('rss');
        //$this->RequestHandler->renderAs($this, 'xml');
        $this->RequestHandler->respondAs('xml');
        
      

     
        
                            
        $pages_table = TableRegistry::get('Pages');
        $pages = $pages_table->getRssInformation();
        

        $pages_arr = array();
        
        foreach($pages as $page){
            //Debug($page);
            $pages_arr[] = '<item turbo="true">
                                <link>https://'.$_SERVER['HTTP_HOST'].DS.'pages'.DS.$page->alias.'</link>
                                <turbo:content>
                                    <![CDATA[<header><h1>'.$page->h1.'</h1></header>'.$page->body_light.']]>
                                </turbo:content>
                            </item>';
        }
        
        //Debug($pages_arr);
                
        
        $this->set(compact('pages', 'pages_arr'));
        //$this->RequestHandler->respondAs('xml');


    }    
    
}