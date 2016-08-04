<?php
namespace App\Model\Table;

use App\Model\Entity\SchoolSetupElement;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SoftSchoolSetupElement Model
 *
 */
class SchoolSetupElementTable extends Table
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

        $this->table('school_setup_element');
        $this->displayField('TBL30_ELEMENT_ID');
        $this->primaryKey('TBL30_ELEMENT_ID');
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
            ->integer('TBL30_ELEMENT_ID')
            ->allowEmpty('TBL30_ELEMENT_ID', 'create');

        $validator
            ->allowEmpty('TBL30_ELEMENT_TYPE');

        $validator
            ->allowEmpty('TBL30_ELEMENT_DATA');

        $validator
            ->allowEmpty('TBL30_ELEMENT_PARENT');

        $validator
            ->integer('TBL30_STATUS')
            ->requirePresence('TBL30_STATUS', 'create')
            ->notEmpty('TBL30_STATUS');

        $validator
            ->date('TBL30_SYSTEM_REPORT_DATE')
            ->allowEmpty('TBL30_SYSTEM_REPORT_DATE');

        $validator
            ->date('TBL30_ENTRY_DATE')
            ->requirePresence('TBL30_ENTRY_DATE', 'create')
            ->notEmpty('TBL30_ENTRY_DATE');

        return $validator;
    }
}
