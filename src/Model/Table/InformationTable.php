<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Information Model
 *
 * @method \App\Model\Entity\Information get($primaryKey, $options = [])
 * @method \App\Model\Entity\Information newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Information[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Information|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Information|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Information patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Information[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Information findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InformationTable extends Table
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

        $this->setTable('information');
        $this->setDisplayField('title');
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
            ->nonNegativeInteger('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmpty('title');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->allowEmpty('phone');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('address')
            ->maxLength('address', 255)
            ->allowEmpty('address');

        $validator
            ->scalar('body')
            ->maxLength('body', 4294967295)
            ->allowEmpty('body');

        $validator
            ->scalar('soc_tw')
            ->maxLength('soc_tw', 255)
            ->allowEmpty('soc_tw');

        $validator
            ->scalar('soc_wk')
            ->maxLength('soc_wk', 255)
            ->allowEmpty('soc_wk');

        $validator
            ->scalar('soc_fb')
            ->maxLength('soc_fb', 255)
            ->allowEmpty('soc_fb');

        $validator
            ->scalar('soc_goo')
            ->maxLength('soc_goo', 255)
            ->allowEmpty('soc_goo');

        $validator
            ->scalar('soc_inst')
            ->maxLength('soc_inst', 255)
            ->allowEmpty('soc_inst');

        $validator
            ->scalar('soc_you')
            ->maxLength('soc_you', 255)
            ->allowEmpty('soc_you');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
