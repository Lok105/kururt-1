<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Cache\Cache;
use Cake\I18n\Time;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize(){
        
        parent::initialize();
        
        $this->viewBuilder()->setLayout('busines');

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Support');
        
        $this->loadComponent('Auth', [
                                    'loginAction' => [
                                        'controller' => 'Auth',
                                        'action' => 'login'
                                    ],
                                    'authError' => 'Пожалуйста авторизуйтесь',
                                    'authorize' => ['Controller'],
                                    'loginRedirect' => [
                                        'controller' => 'Admin',
                                        'action' => 'main'
                                    ],
                                    'logoutRedirect' => [
                                        'controller' => 'Index',
                                        'action' => 'index'
                                    ]
                                    ]);
                                    
                                      

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        
        $user_reg['role'] = $this->Auth->user('role');
        $user_reg['id'] = $this->Auth->user('id');
        $user_reg['username'] = $this->Auth->user('username');
        $user_reg['name'] = $this->Auth->user('name');


        $infoTable = TableRegistry::get('Information');
        $info = $infoTable->find()->first();


 
        
        $serviceTable = TableRegistry::get('Services');
        $services_menu = $serviceTable->find('Threaded')->select(['id', 'parent_id', 'alias', 'h1', 'menu_title'])->where(['published' => '1', 'show_menu' => '1'])->order(['position' => 'asc']);
        
        $countService = 0;
        foreach($services_menu as $service){
            if($service->parent_id == 0){
                $countService++;
            }
            
        }
        
        if($countService == 0){
            $services_menu = null;
        }
        
        $pageTable = TableRegistry::get('Pages');
        $page_menu = $pageTable->find('Threaded')->select(['id', 'parent_id', 'alias', 'h1', 'menu_title'])->where(['published' => '1', 'show_menu' => '1']);
        
        $countPage = 0;
        foreach($page_menu as $page){
            if($page->parent_id == 0){
                $countPage++;
            }
            
        }
        
        if($countPage == 0){
            $page_menu = null;
        }        
        
        
        if (($bottom_menu = Cache::read('bottom_menu', 'ultrashort')) === false) {
    
            $pagesTable = TableRegistry::get('Pages');
            
            $pagesForeMenu = $pagesTable->find()->select(['id', 'alias', 'menu_title', 'position', 'published', 'bottom_menu'])->where(['published' => '1', 'bottom_menu' => '1'])->order(['position' => 'asc']);
            
            $bottom_menu = array();
            foreach($pagesForeMenu as $pa){
                $bottom_menu[$pa->alias] = $pa->menu_title;
      
            }
    
            Cache::write('bottom_menu', $bottom_menu, 'ultrashort');
        }
        
        $newsTable = TableRegistry::get('News');
        
        $newsHave = $newsTable->find()->select(['id'])->where(['published' => '1'])->first();                 

        //debug($bottom_menu);
        
        $this->myInfo = array('companyName' => $info->title, 'companyAddress' => $info->address); 
        
        $session = $this->request->getSession();
        
        if (!$session->read('secret')) {
            $session->write('secret', rand(10000, 99999));
        }
        $secret = $session->read('secret');                        
        
        $this->set(compact(['user_reg', 'info', 'services_menu', 'page_menu', 'bottom_menu', 'newsHave', 'secret']));        
        
    }
    
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    
    public function beforeFilter(Event $event){
        
        //$this->Auth->allow(['index']);
        
        if($this->Auth->user('role') == 'admin'){
            
            $_SESSION['KCFINDER'] = ['disabled' => false];
            
            // Берем кол-во новых сообщений
            /*$messages_table = TableRegistry::get('Messages');
            $messages_count = $messages_table->find()->where(['read_already' => '0']);
            $messages_count->select(['count' => $messages_count->func()->count('*'), 'name', 'body', 'created']);
            
           
            foreach($messages_count as $mc){
                //debug($mc);
                $count_messages = $mc->count;
            }
            
            if($count_messages > 0){
                $messages = $messages_table->find()->where(['read_already' => '0'])->order(['created' => 'desc'])->limit(5);
            }else{
                $messages = null;
            }*/
            
            $count_messages = null;
            $messages = null;
            //debug($count_messages);            
            $this->set(compact(['count_messages', 'messages']));
        }

    //debug($this->Auth->user());        
    }
    
    public function isAuthorized($user = null){
        // Admin can access every action
        //debug($user['username']);
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
    
        // Default deny
        return false;
    }     
}
