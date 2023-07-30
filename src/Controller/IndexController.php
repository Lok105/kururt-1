<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\Cache\Cache;

class IndexController extends AppController{


    public function initialize(){

        parent::initialize();

        
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $this->Auth->allow(['index', 'message']);
        
       
    }

    public function index(){


        $portfolioTable = TableRegistry::get('Portfolios');
        $portfolios = $portfolioTable->find();
        
        $portCount = 0;
        foreach($portfolios as $po){
            $portCount++;
        }
        if($portCount == 0){
            $portfolios = null;
        }
        
        if (($slides = Cache::read('slides', 'ultrashort')) === false) {
    
            $slidesTable = TableRegistry::get('Slides');
            
            $slidesObj = $slidesTable->find()->order(['position' => 'asc']);
            
            $slides = array();
            foreach($slidesObj as $slide){
                $slides[$slide->id]['url'] = $slide->url;
                $slides[$slide->id]['title'] = $slide->title;
                $slides[$slide->id]['text'] = $slide->text;
                $slides[$slide->id]['img'] = $slide->img;
                $slides[$slide->id]['show_form'] = $slide->show_form;
      
            }
    
            Cache::write('slides', $slides, 'ultrashort');
        } 
        
        if (($indexServices = Cache::read('indexServices', 'ultrashort')) === false) {
    
            $servicesTable = TableRegistry::get('Services');
            
            $servicesObj = $servicesTable->find()->select(['id', 'alias', 'menu_title', 'short', 'img'])->where(['published' => '1', 'show_index' => '1'])->order(['position' => 'asc']);
            
            $indexServices = array();
            foreach($servicesObj as $service){
                $indexServices[$service->id]['alias'] = $service->alias;
                $indexServices[$service->id]['menu_title'] = $service->menu_title;
                $indexServices[$service->id]['short'] = $service->short;
                $indexServices[$service->id]['img'] = $service->img;
      
            }
    
            Cache::write('indexServices', $indexServices, 'ultrashort');
        } 
        
        if (($histories = Cache::read('histories', 'ultrashort')) === false) {
    
            $historiesTable = TableRegistry::get('Histories');
            
            $historiesObj = $historiesTable->find()->select(['id', 'year', 'title', 'text', 'img'])->order(['position' => 'asc']);
            
            $histories = array();
            foreach($historiesObj as $his){
                $histories[$his->id]['year'] = $his->year;
                $histories[$his->id]['title'] = $his->title;
                $histories[$his->id]['text'] = $his->text;
                $histories[$his->id]['img'] = $his->img;
      
            }
    
            Cache::write('histories', $histories, 'ultrashort');
        } 
        
        if (($staffersIndex = Cache::read('staffersIndex', 'ultrashort')) === false) {
    
            $staffersTable = TableRegistry::get('Staffers');
            
            $staffersObj = $staffersTable->find()->where(['published' => '1'])->limit(4);
            
            $staffersIndex = array();
            foreach($staffersObj as $so){
                $staffersIndex[$so->id]['name'] = $so->name;
                $staffersIndex[$so->id]['position'] = $so->position;
                $staffersIndex[$so->id]['description'] = $so->description;
                $staffersIndex[$so->id]['img'] = $so->img;
                $staffersIndex[$so->id]['soc_vk'] = $so->soc_vk;
                $staffersIndex[$so->id]['soc_fb'] = $so->soc_fb;
                $staffersIndex[$so->id]['soc_tw'] = $so->soc_tw;
                $staffersIndex[$so->id]['soc_goo'] = $so->soc_goo;
            }
    
            Cache::write('staffersIndex', $staffersIndex, 'ultrashort');
        }
        
        if (($questions = Cache::read('questions', 'ultrashort')) === false) {
    
            $questionsTable = TableRegistry::get('Questions');
            
            $questionsObj = $questionsTable->find()->order(['position' => 'asc']);
            
            $questions = array();
            foreach($questionsObj as $quest){
                $questions[$quest->id]['title'] = $quest->title;
                $questions[$quest->id]['text'] = $quest->text;
      
            }
    
            Cache::write('questions', $questions, 'ultrashort');
        }                
        
        $newsTable = TableRegistry::get('News');
        
        $news = $newsTable->find()->where(['published' => '1', 'show_index' => '1'])->order(['created' => 'desc']);
        
        $newCount = 0;
        foreach($news as $n){
            $newCount++;
        }
        if($newCount == 0){
            $news = null;
        }
        
        if (($partners = Cache::read('partners', 'ultrashort')) === false) {
    
            $partnersTable = TableRegistry::get('Partners');
            
            $partnersObj = $partnersTable->find();
            
            $partners = array();
            foreach($partnersObj as $partner){
                $partners[$partner->id]['url'] = $partner->url;
                $partners[$partner->id]['title'] = $partner->title;
                $partners[$partner->id]['img'] = $partner->img;
      
            }
    
            Cache::write('partners', $partners, 'ultrashort');
        }        
        
        $page_text_table = TableRegistry::get('PagesTexts');
        
        $meta = $page_text_table->getPageText('/');
        
        if(!isset($meta['title']) || $meta['title'] == ''){
            $meta['title'] = $this->myInfo['companyName'];
        }
        
        if(!isset($meta['description']) || $meta['description'] == ''){
            $meta['description'] = $this->myInfo['companyName'].', '.$this->myInfo['companyAddress'];
        }        
        //debug($this->myInfo);        
                     
        
        //debug($indexServices);
        
        $this->set(compact('portfolios', 'slides', 'indexServices', 'histories', 'staffersIndex', 'questions', 'news', 'partners', 'meta'));
    }    

}