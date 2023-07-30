<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * News Model
 *
 * @property \App\Model\Table\NewsTable|\Cake\ORM\Association\BelongsTo $ParentNews
 * @property \App\Model\Table\NewsTable|\Cake\ORM\Association\HasMany $ChildNews
 *
 * @method \App\Model\Entity\News get($primaryKey, $options = [])
 * @method \App\Model\Entity\News newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\News[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\News|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\News|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\News patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\News[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\News findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NewsTable extends Table
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

        $this->setTable('news');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ParentNews', [
            'className' => 'News',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildNews', [
            'className' => 'News',
            'foreignKey' => 'parent_id'
        ]);
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('alias')
            ->maxLength('alias', 255)
            ->requirePresence('alias', 'create')
            ->notEmpty('alias')
            ->add('alias', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->scalar('h1')
            ->maxLength('h1', 255)
            ->allowEmpty('h1');

        $validator
            ->scalar('menu_title')
            ->maxLength('menu_title', 255)
            ->allowEmpty('menu_title');

        $validator
            ->scalar('short')
            ->allowEmpty('short');

        $validator
            ->scalar('body')
            ->maxLength('body', 4294967295)
            ->allowEmpty('body');

        $validator
            ->scalar('img')
            ->maxLength('img', 255)
            ->allowEmpty('img');

        $validator
            ->scalar('back')
            ->maxLength('back', 255)
            ->allowEmpty('back');

        $validator
            ->integer('position')
            ->allowEmpty('position');

        $validator
            ->scalar('published')
            ->requirePresence('published', 'create')
            ->notEmpty('published');

        $validator
            ->scalar('show_index')
            ->requirePresence('show_index', 'create')
            ->notEmpty('show_index');

        $validator
            ->scalar('show_menu')
            ->requirePresence('show_menu', 'create')
            ->notEmpty('show_menu');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['alias']));
        $rules->add($rules->existsIn(['parent_id'], 'ParentNews'));

        return $rules;
    }
}
