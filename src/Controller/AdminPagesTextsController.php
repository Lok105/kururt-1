<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * PagesTexts Controller
 *
 * @property \App\Model\Table\PagesTextsTable $PagesTexts
 *
 * @method \App\Model\Entity\PagesText[] paginate($object = null, array $settings = [])
 */
class AdminPagesTextsController extends AppController
{
    
    
    public $paginate = [
        'limit' => 50,
        'order' => [
            'PagesTexts.created' => 'desc'    
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
        $pagesTexts = $this->paginate($this->AdminPagesTexts);

        $this->set(compact('pagesTexts'));
        $this->set('_serialize', ['pagesTexts']);
    }

    /**
     * View method
     *
     * @param string|null $id Pages Text id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagesText = $this->AdminPagesTexts->get($id, [
            'contain' => []
        ]);

        $this->set('pagesText', $pagesText);
        $this->set('_serialize', ['pagesText']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        $pagesText = $this->AdminPagesTexts->find()->where(['url' => $this->request->data('url')])->first();
        
        if(!$pagesText){
            // Если уже есть редактируем
            $pagesText = $this->AdminPagesTexts->newEntity(); 
        }
        
        
        if ($this->request->is('post')) {
            
            $pagesText = $this->AdminPagesTexts->patchEntity($pagesText, $this->request->getData());
            if ($this->AdminPagesTexts->save($pagesText)) {
                $this->Flash->success('Страница создана');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка');
        }
        $this->set(compact('pagesText'));
        $this->set('_serialize', ['pagesText']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pages Text id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagesText = $this->AdminPagesTexts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagesText = $this->AdminPagesTexts->patchEntity($pagesText, $this->request->getData());
            if ($this->AdminPagesTexts->save($pagesText)) {
                $this->Flash->success('Страница отредактирована');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка редактирования');
        }
        $this->set(compact('pagesText'));
        $this->set('_serialize', ['pagesText']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pages Text id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagesText = $this->AdminPagesTexts->get($id);
        if ($this->AdminPagesTexts->delete($pagesText)) {
            $this->Flash->success('Страница удалена');
        } else {
            $this->Flash->error('Ошибка удаления');
        }

        return $this->redirect(['action' => 'index']);
    }
}
