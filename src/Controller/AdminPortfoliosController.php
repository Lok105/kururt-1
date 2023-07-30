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
class AdminPortfoliosController extends AppController{
    
    
    
    
    public $paginate = [
        'limit' => 30,
        'order' => [
            'Portfolios.created' => 'desc'    
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
        $portfolios = $this->paginate($this->AdminPortfolios);

        $this->set(compact('portfolios'));
        $this->set('_serialize', ['portfolios']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $portfolio = $this->AdminPortfolios->newEntity();
        if ($this->request->is('post')) {
            $portfolio = $this->AdminPortfolios->patchEntity($portfolio, $this->request->getData());
            
            
            $file = $this->request->data('img');
            //debug($this->request->getData());
            //exit();
            if(isset($file['name']) && $file['name'] != ''){
                
                // Проверяем допустимый ли файл
                $can_save = $this->Support->mimeTypeCheck($file, 5242880);
                
                if($can_save == true){
                    // Если проверка пройдена, загружаем картинку
              
                    $portfolio->img = $this->Support->customResizeImg($file, 
                                                                    $this->request->data('x_top'),
                                                                    $this->request->data('y_top'), 
                                                                    800, 
                                                                    600,
                                                                    $this->request->data('w_top'),
                                                                    $this->request->data('h_top')
                                                                );                    
                    
                }  
            }else{
                unset($file);
            }            
            
            $portfolio->teg_alias = $this->Support->translit($portfolio->teg_title);
            
            if ($this->AdminPortfolios->save($portfolio)) {
                $this->Flash->success('Карточка портфолио создана');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка, попробуйте еще раз');
        }
        $this->set(compact('portfolio'));
        $this->set('_serialize', ['portfolio']);
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
        $portfolio = $this->AdminPortfolios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $portfolio = $this->AdminPortfolios->patchEntity($portfolio, $this->request->getData());
            
            
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
              
                    $portfolio->img = $this->Support->customResizeImg($file, 
                                                                    $this->request->data('x_top'),
                                                                    $this->request->data('y_top'), 
                                                                    1280, 
                                                                    920,
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
                    $portfolio->img = $data['last_img'];
                }                
            }            
            
            $portfolio->teg_alias = $this->Support->translit($portfolio->teg_title);
                        
            if ($this->AdminPortfolios->save($portfolio)) {
                $this->Flash->success('Карточка портфолио отредактирована');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка редактирования карточки портфолио');
        }
        $this->set(compact('portfolio'));
        $this->set('_serialize', ['portfolio']);
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
        $portfolio = $this->AdminPortfolios->get($id);
        $img_name = $portfolio->img;
        if ($this->AdminPortfolios->delete($portfolio)) {
            if($img_name){
                unlink(WWW_ROOT.'img/upload/'.$img_name);                
            } 
                       
            $this->Flash->success('Портфолио удалено');
        } else {
            $this->Flash->error('Ошибка удаления');
        }

        return $this->redirect(['action' => 'index']);
    }
}
