<?php
namespace App\Model\Table;

use App\Model\Entity\SectionInfo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SectionInfo Model
 */
class SectionInfoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('section_info');
        $this->displayField('sid');
        $this->primaryKey('sid');
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
            ->add('sid', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('sid', 'create')
            ->add('sid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
            
        $validator
            ->add('cid', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('cid');
            
        $validator
            ->allowEmpty('section_name');
            
        $validator
            ->allowEmpty('start_time');
            
        $validator
            ->allowEmpty('end_time');
            
        $validator
            ->allowEmpty('room_no');
            
        $validator
            ->allowEmpty('extra_info');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

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
        $rules->add($rules->isUnique(['sid']));
        return $rules;
    }
}
