<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ServiceTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->addBehavior('Timestamp');

    }


    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->notEmptyString('name',__('Nesmie byť prazdné pole'));
        $validator
            ->scalar('price')
            ->notEmptyString('name',__('Nesmie byť prazdné pole'));
        $validator
            ->scalar('billing_period')
            ->notEmptyString('billing_period',__('Nesmie byť prazdné pole'));
        $validator
            ->scalar('date_start')
            ->notEmptyString('date_start',__('Nesmie byť prazdné pole'));
        $validator
            ->scalar('date_end')
            ->notEmptyString('date_end',__('Nesmie byť prazdné pole'));

        return $validator;
    }
}
