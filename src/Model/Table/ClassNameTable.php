<?php
namespace App\Model\Table;

use App\Model\Entity\ClassName;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ClassName Model
 */
class ClassNameTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('class_name');
        $this->displayField('class_name');
        $this->primaryKey('id');
       // $this->belongsTo('Classes', [
        //    'foreignKey' => 'class_id'
       // ]);
        //$this->belongsTo('Faculties', [
        //    'foreignKey' => 'faculty_id',
        //    'joinType' => 'INNER'
       // ]);
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
            ->allowEmpty('id', 'create');
            
        $validator
            ->allowEmpty('class_name');
            
        $validator
            ->add('subject_code', 'valid', ['rule' => 'numeric'])
            ->requirePresence('subject_code', 'create')
            ->notEmpty('subject_code');
            
        $validator
            ->allowEmpty('description');
            
        $validator
            ->requirePresence('file_url', 'create')
            ->notEmpty('file_url');
            
        $validator
            ->add('order', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('order');
            
        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');
            
        $validator
            ->add('del_status', 'valid', ['rule' => 'numeric'])
            ->requirePresence('del_status', 'create')
            ->notEmpty('del_status');
            
        $validator
            ->allowEmpty('entry_by');
            
        $validator
            ->add('entry_date', 'valid', ['rule' => 'date'])
            ->allowEmpty('entry_date');

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
       // $rules->add($rules->existsIn(['class_id'], 'Classes'));
       // $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));
        return $rules;
    }
}
