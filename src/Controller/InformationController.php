<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\Mailer\Email;
use Cake\I18n\Time;
use Cake\Cache\Cache;

/**
 * Information Controller
 *
 * @property \App\Model\Table\InformationTable $Information
 *
 * @method \App\Model\Entity\Information[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformationController extends AppController{
    
    
    public function initialize(){

        parent::initialize();
       
        
    }    

    public function beforeFilter(Event $event){
        
        parent::beforeFilter($event);
        
        $this->Auth->allow(['index', 'contacts', 'sendBack']);
        
       
    }    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $information = $this->Information->find()->first();
        if($information->h1){
            $bbackh1 = $information->h1;
        }else{
            $bbackh1 = 'О компании';
        }
        if($information->back){
            $bback = $information->back;
        }else{
            $bback = 'about.jpg';
        } 
        
        $staffersTable = TableRegistry::get('Staffers');
        
        $staffers = $staffersTable->find()->where(['published' => '1']);
        
        $count = 0;
        foreach($staffers as $staff){
            $count++;
        }
        
        if($count == 0){
            $staffers = null;
        }
        
        $this->set(compact('information', 'bbackh1', 'bback', 'staffers'));
    }

    /**
     * View method
     *
     * @param string|null $id Information id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $information = $this->Information->get($id, [
            'contain' => []
        ]);

        $this->set('information', $information);
    }
    
    public function contacts(){
        
        $information = $this->Information->find()->first();

        $bbackh1 = 'Контакты';

        if($information->back){
            $bback = $information->back;
        }else{
            $bback = 'about.jpg';
        }
        
        $this->set(compact('information', 'bbackh1', 'bback'));         
    }
    
    
    public function sendBack(){
        
        $messages_table = TableRegistry::get('Messages');
        $message = $messages_table->newEntity();
        
        
        if ($this->request->is('post')) {
             
             
             //debug($this->request->getData());
             //exit();

            $company_table = TableRegistry::get('Information');
            $company = $company_table->find()->first();
             
             
             if($company->recaptcha && $company->recaptcha != ''){   
                 $capca = $this->request->getData('g-recaptcha-response');   
                 if(empty($capca)) {
                    $this->Flash->error('Вероятно вы все же робот');
                    return $this->redirect($this->referer());
                 }            
                
                 if(!$this->checkCaptca($capca)){
                    $this->Flash->error('Вероятно вы все же робот');
                    return $this->redirect($this->referer());                
                 }
             }
             
            if($this->request->data('surname') != ''){
                $this->Flash->error('Заявка не отправлена возможно вы робот');
                return $this->redirect($this->referer());
            }
            
            if($this->request->getData('check') != $_SESSION['secret']){
               return $this->redirect($this->referer());
            }                            
            
            
            if($this->request->getData('email') == '' && $this->request->getData('body') == ''){
                $this->Flash->error('Пожалуйста, заполните поля формы обратной связи');
                return $this->redirect($this->referer());
            }            
            
            $message = $messages_table->patchEntity($message, $this->request->getData());
            
            if ($messages_table->save($message)) {
                
                // Отправляем письмо админу
                if($company->email && $company->email != ''){
                    
                    $email = new Email();
                    $email->emailFormat('html')
                    ->sender($company->email, $company->title)                
                    ->from($company->email)
                    ->to($company->email, $company->email)
                    ->subject('Новое сообщение на сайте pozitivland.ru');
                    
                    $email->send('<div style="background-color:#b8312f;color:#fff;font-size:16px;padding: 5px 15px;">Новое сообщение на сайте pozitivland.ru</div>
                                    <div style="border: 1px solid #b8312f;padding: 15px;">
                                    <div>Тема сообщения: <span>'.$message->theme.'</span></div>
                                    <div>Имя: <span>'.$message->name.'</span></div>
                                    <div>телефон: <span>'.$message->phone.'</span></div>
                                    <div>E-mail: <span>'.$message->email.'</span></div>
                                    <div>Сообщение: <span>'.$message->body.'</span></div>
                                    </div>');                
                
                }
                $this->Flash->success('Ваше сообщение отправлено! Спасибо! Мы свяжемся с вами в ближайшее время!');

                return $this->redirect($this->referer());
            }else{
                $this->Flash->error('Ошибка отправки формы! Попробуйте еще раз');
            }

        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);

    }
    
    public function GetIP(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;        
    }
    
    public function checkCaptca($capca = ''){
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        
        $secret = '6LevtmIUAAAAAOSBP1QspeMycX4ELckw3j5Oo764';

        $ip = $_SERVER['REMOTE_ADDR'];
        
        $url_data = $url.'?secret='.$secret.'&response='.$capca.'&remoteip='.$ip;
        $curl = curl_init();
        
        curl_setopt($curl,CURLOPT_URL,$url_data);
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
        
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
        
        
        $res = curl_exec($curl);
        curl_close($curl);
        
        $res = json_decode($res);
        
        if($res->success) {
            return true;
        }else {
            return false;
        }         
    }         


}
