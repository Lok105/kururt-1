<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 *
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminQuestionsController extends AppController{
    
    
    
    
    
    public $paginate = [
        'limit' => 50,
        'order' => [
            'Questions.position' => 'desc'    
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
        $questions = $this->paginate($this->AdminQuestions);

        $this->set(compact('questions'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add(){
        
        $question = $this->AdminQuestions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->AdminQuestions->patchEntity($question, $this->request->getData());
            
            
            if ($this->AdminQuestions->save($question)) {
                $this->Flash->success('Блок вопрос - ответ создан');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Ошибка, попробуйте еще раз');
        }
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->AdminQuestions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->AdminQuestions->patchEntity($question, $this->request->getData());
            if ($this->AdminQuestions->save($question)) {
                $this->Flash->success(__('Блок вопрос - ответ отредактирован'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ошибка, попробуйте еще раз'));
        }
        $this->set(compact('question'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->AdminQuestions->get($id);
        if ($this->AdminQuestions->delete($question)) {
            $this->Flash->success(__('Блок вопрос - ответ удален'));
        } else {
            $this->Flash->error(__('Ошибка удаления, попробуйте еще раз'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
