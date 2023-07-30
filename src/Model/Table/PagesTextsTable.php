<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Validation\Validator;

class PagesTextsTable extends Table
{
    
    

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('pages_texts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('description');



        return $validator;
    }    

    public function getPageText($url){
        $meta = array();
        $text = $this->find()->where(['url' => $url])->first();
        
        //debug($text);
        
        if($text){
            $meta['title'] = $text->title;
            $meta['description'] = $text->description;
            $meta['body'] = $text->body;
        }
        
        return $meta;
        
        
    }
    
    public function getAllTexts(){
        
        $all_texts = $this->find('all')->order(['url' => 'asc']);

        return $all_texts;
    }
}