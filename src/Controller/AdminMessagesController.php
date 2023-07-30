<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;

/**
 * Messages Controller
 *
 * @property \App\Model\Table\MessagesTable $Messages
 *
 * @method \App\Model\Entity\Message[] paginate($object = null, array $settings = [])
 */
class AdminMessagesController extends AppController{
    
    
    public $paginate = [
        'limit' => 50,
        'order' => [
            'Messages.created' => 'desc'    
        ]
    ];

    public function initialize(){

        parent::initialize();
        $this->viewBuilder()->layout('admin');
        
        
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);   
    }     

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $messages = $this->paginate($this->AdminMessages->find()->order(['created' => 'desc']));
        
        
        if($this->request->is('post')){
            
            $data = $this->request->data;
            
            if(!isset($data['message'])){
                $this->Flash->warning(__('Вы не выбрали ни одного сообщения.'));
                return $this->redirect($this->referer());                
            }
            
            if(isset($data['del_mes'])){
                $result = array();
                foreach($data['message'] as $id){

                    $entity = $this->AdminMessages->get($id);                    
                    if($this->AdminMessages->delete($entity)){
                        $result[] = true;
                    }   

                }
                
                if(!empty($result)){
                    $this->Flash->success(__('Сообщения удалены'));
                    return $this->redirect($this->referer());                     
                }else{
                    $this->Flash->error(__('Ошибка удаления сообщений.'));
                    return $this->redirect($this->referer());                    
                }
            }
            
            if(isset($data['read_mes'])){
                
                $result = array();
                foreach($data['message'] as $id){

                    $entity = $this->AdminMessages->get($id);
                    $entity->read_already = '1';                    
                    if($this->AdminMessages->save($entity)){
                        $result[] = true;
                    }   

                }
                
                if(!empty($result)){
                    $this->Flash->success(__('Сообщения помечены прочитанными'));
                    return $this->redirect($this->referer());                     
                }else{
                    $this->Flash->error(__('Ошибка.'));
                    return $this->redirect($this->referer());                    
                }                
               
            }
            
                     
            
            //debug($data); 
        }        
        
        

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    /**
     * View method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $message = $this->AdminMessages->get($id, [
            'contain' => []
        ]);
        
        $message->read_already = '1';
        $this->AdminMessages->save($message);
        
        if($this->request->is('post', 'put')){

            $company_table = TableRegistry::get('Information');
            $company = $company_table->find()->first();
            
            if($company->email){
                
                $content['company'] = $company->title;
                $content['theme'] = $this->request->data('theme');
                $content['body'] = $this->request->data('body');
                $content['body_old'] = $message->body;
                
                // Отправляем на почту письмо
                
                $email = new Email('default');
                $email
                    ->viewVars(['content' => $content])
                    ->template('answerbody', 'unswer')
                    ->emailFormat('html')
                    ->sender($company->email, $company->title)
                    ->to($message->email, $message->email)
                    ->from($company->email)
                    ->subject('Ваш запрос')
                    ->send();                 
                
                
                // Помечаем, что ответ есть
                $message->body_answer = $this->request->data('body');
                $message->answer = '1';
                
                if($this->AdminMessages->save($message)){
    
                    $this->Flash->success(__('Ответ на сообщение успешно отправлен'));
                    return $this->redirect(['controller' => 'adminMessages', 'action' => 'index']);
    
                }else{
                    $this->Flash->error(__('Ошибка отправки сообщения.'));
                    return $this->redirect($this->referer());                    
                }
            
            }else{
                    $this->Flash->error(__('Не указан E-mail компании в информации о компании. Отпрака сообщения не возможна.'));
                    return $this->redirect(['controller' => 'adminMessages', 'action' => 'index']);                
            }               
        }        
        

        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }



    /**
     * Delete method
     *
     * @param string|null $id Message id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->AdminMessages->get($id);
        if ($this->AdminMessages->delete($message)) {
            $this->Flash->success(__('Сообщение удалено.'));
        } else {
            $this->Flash->error(__('Ошибка удаления сообщения. Попробуйте еще раз.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
