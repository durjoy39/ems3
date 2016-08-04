<?php
namespace App\Model\Table;

use App\Model\Entity\ClassInfo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClassInfo Model
 */
class ClassInfoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('class_info');
        $this->displayField('cid');
        $this->primaryKey('cid');
        $this->belongsTo('TeacherBasic', [
            'foreignKey' => 'teacher_id'
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
            ->add('cid', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('cid', 'create')
            ->add('cid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
            
        $validator
            ->allowEmpty('class_campus');
            
        $validator
            ->allowEmpty('class_shift_info');
            
        $validator
            ->allowEmpty('class_medium');
            
        $validator
            ->add('class_name', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('class_name');
            
        $validator
            ->add('class_start_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('class_start_date');
            
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
            
     /*  $validator
            ->add('delete_status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('delete_status', 'create')
            ->notEmpty('delete_status');

        $validator
            ->add('delete_kg', 'valid', ['rule' => 'numeric'])
            ->requirePresence('delete_kg', 'create')
            ->notEmpty('delete_kg');*/

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
        $rules->add($rules->isUnique(['cid']));
        $rules->add($rules->existsIn(['teacher_id'], 'TeacherBasic'));

        return $rules;
    }
}
