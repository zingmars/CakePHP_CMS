<?php
namespace App\Model\Table;

use App\Model\Entity\Post;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 */
class PostsTable extends Table
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

        $this->table('posts');
        $this->displayField('title');
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('shortbody', 'create')
            ->notEmpty('shortbody');

        $validator
            ->requirePresence('longbody', 'create')
            ->notEmpty('longbody');

        $validator
            ->add('createdate', 'valid', ['rule' => 'datetime'])
            ->notEmpty('createdate');

        $validator
            ->add('creator', 'valid', ['rule' => 'numeric'])
            ->requirePresence('creator', 'create')
            ->notEmpty('creator');

        return $validator;
    }
}
