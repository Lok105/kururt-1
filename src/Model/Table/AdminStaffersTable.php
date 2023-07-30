<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Staffers Model
 *
 * @method \App\Model\Entity\Staffer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staffer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Staffer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staffer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staffer|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staffer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staffer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staffer findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdminStaffersTable extends Table
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

        $this->setTable('staffers');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmpty('name');

        $validator
            ->scalar('position')
            ->maxLength('position', 255)
            ->allowEmpty('position');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');


        $validator
            ->scalar('soc_vk')
            ->maxLength('soc_vk', 255)
            ->allowEmpty('soc_vk');

        $validator
            ->scalar('soc_fb')
            ->maxLength('soc_fb', 255)
            ->allowEmpty('soc_fb');

        $validator
            ->scalar('soc_tw')
            ->maxLength('soc_tw', 255)
            ->allowEmpty('soc_tw');

        $validator
            ->scalar('soc_goo')
            ->maxLength('soc_goo', 255)
            ->allowEmpty('soc_goo');

        return $validator;
    }
}

