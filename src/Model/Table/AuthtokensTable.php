<?php
namespace App\Model\Table;

use App\Model\Entity\Authtoken;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Authtokens Model
 *
 */
class AuthtokensTable extends Table
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

        $this->table('authtokens');
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('userid', 'valid', ['rule' => 'numeric'])
            ->requirePresence('userid', 'create')
            ->notEmpty('userid');

        $validator
            ->requirePresence('public_token', 'create')
            ->notEmpty('public_token');

        $validator
            ->requirePresence('private_token', 'create')
            ->notEmpty('private_token');

        $validator
            ->notEmpty('type');

        $validator
            ->notEmpty('state');

        $validator
            ->add('createdate', 'valid', ['rule' => 'datetime'])
            ->notEmpty('createdate');

        return $validator;
    }
}
