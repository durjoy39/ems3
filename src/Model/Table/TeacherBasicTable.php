<?php
namespace App\Model\Table;

use App\Model\Entity\TeacherBasic;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TeacherBasic Model
 */
class TeacherBasicTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('teacher_basic');
        $this->displayField('nick_name_eng');
        $this->primaryKey('id');

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
            ->add('id', 'valid', ['rule' => 'integer'])
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);
            
        $validator
            ->allowEmpty('first_name_eng');
            
        $validator
            ->allowEmpty('middle_name');
            
        $validator
            ->allowEmpty('last_name');
            
        $validator
            ->allowEmpty('nick_name_eng');
            
        $validator
            ->allowEmpty('bangla_name');
            
        $validator
            ->allowEmpty('father_husband_name');
            
        $validator
            ->allowEmpty('mother_name');
            
        $validator
            ->add('dob', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('dob');
            
        $validator
            ->allowEmpty('gender');
            
        $validator
            ->allowEmpty('relegion');
            
        $validator
            ->allowEmpty('blood_group');
            
        $validator
            ->allowEmpty('birth_place');
            
        $validator
            ->allowEmpty('nationality');
            
        $validator
            ->allowEmpty('country');
            
        $validator
            ->allowEmpty('designation');
            
        $validator
            ->allowEmpty('responsibility');
            
        $validator
            ->allowEmpty('file');
            
        $validator
            ->allowEmpty('phone');
            
        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');
            
        $validator
            ->allowEmpty('mobile');
            
        $validator
            ->allowEmpty('present_address');
            
        $validator
            ->allowEmpty('permanent_address');
            
        $validator
            ->allowEmpty('resume');
            
        $validator
            ->allowEmpty('class');
            
        $validator
            ->add('delete_status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('delete_status', 'create')
            ->notEmpty('delete_status');
            
        $validator
            ->add('join_date', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('join_date');
            
        $validator
            ->allowEmpty('type');
            
        $validator
            ->add('first_join_date', 'valid', ['rule' => 'numeric'])
            ->requirePresence('first_join_date', 'create')
            ->notEmpty('first_join_date');
            
        $validator
            ->requirePresence('type_of_appoinment', 'create')
            ->notEmpty('type_of_appoinment');
            
        $validator
            ->requirePresence('batch_number', 'create')
            ->notEmpty('batch_number');
            
        $validator
            ->requirePresence('merit_number', 'create')
            ->notEmpty('merit_number');

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
        $rules->add($rules->isUnique(['id']));
        //$rules->add($rules->existsIn(['national_id'], 'Nationals'));
        //$rules->add($rules->existsIn(['institute_teacher_id'], 'InstituteTeachers'));
        return $rules;
    }
}
