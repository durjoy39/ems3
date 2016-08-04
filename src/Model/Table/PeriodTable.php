<?php
namespace App\Model\Table;

use App\Model\Entity\Period;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Period Model
 *
 */
class PeriodTable extends Table
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

        $this->table('period');
        $this->displayField('id');
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('start_time', 'create')
            ->notEmpty('start_time');

        $validator
            ->requirePresence('end_time', 'create')
            ->notEmpty('end_time');

        $validator
            ->requirePresence('period_number', 'create')
            ->notEmpty('period_number');

        $validator
            ->requirePresence('entry_by', 'create')
            ->notEmpty('entry_by');

        $validator
            ->dateTime('entry_date')
            ->requirePresence('entry_date', 'create')
            ->notEmpty('entry_date');

        return $validator;
    }
}
