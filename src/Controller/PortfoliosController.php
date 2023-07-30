<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Portfolios Controller
 *
 * @property \App\Model\Table\PortfoliosTable $Portfolios
 *
 * @method \App\Model\Entity\Portfolio[] paginate($object = null, array $settings = [])
 */
class PortfoliosController extends AppController
{
    
    
    public $paginate = [
        'limit' => 4,
        'order' => [
            'Portfolios.created' => 'desc'    
        ]
    ];     
    
    
    public function initialize(){

        parent::initialize();
        
        
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $this->Auth->allow(['index', 'view']);
        
       
    }    

 
    public function index()
    {
        $portfolios = $this->paginate($this->Portfolios->find()->where(['publish' => '1']));
        
        $random_arr = array();
        foreach($portfolios as $port){
            $port->random = $this->detRandom($random_arr);
            $random_arr[] = $port->random;
            //debug($port);
        }
        
        $page_text_table = TableRegistry::get('PagesTexts');
        
        $meta = $page_text_table->getPageText('/portfolios');
        
        //Debug($_GET);        
        
        $this->set(compact('portfolios', 'meta'));
        $this->set('_serialize', ['portfolios']);
    }
    
    private function detRandom($random_arr){
        $random = mt_rand(1, 8);
        if(in_array($random  ,$random_arr)){
            $new_random = $this->detRandom($random_arr);
        }else{
            $new_random = $random;
        }
        
        return $new_random;
        
    }


    public function view($alias = null)
    {
        $portfolio = $this->Portfolios->find()->where(['alias' => $alias, 'publish' => '1'])->first();
        

        
        if(!$portfolio) {
            throw new NotFoundException(__('Запрашиваемая страница не найдена'));
        }
        
        if($portfolio){
            $pictures_table = TableRegistry::get('Pictures');
            
            $pictures = $pictures_table->getPictures($portfolio->id);
        }
        
        $count_pic = 0;
        foreach($pictures as $p){
            $count_pic++;
        }        
        
        if(isset($portfolio->title) && $portfolio->title != ''){
            $meta['title'] = $portfolio->title;
        } 
        if(isset($portfolio->description) && $portfolio->description != ''){
            $meta['description'] = $portfolio->description;
        } 
        
        $portfolio->looks = $portfolio->looks + 1;
        $this->Portfolios->save($portfolio);                       

        $this->set(compact('portfolio', 'meta', 'pictures', 'count_pic'));
        $this->set('_serialize', ['portfolio']);
    }



}
