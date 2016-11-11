<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Utility\Text;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Answers
 * @property \Cake\ORM\Association\HasMany $PollStatuses
 * @property \Cake\ORM\Association\HasMany $Polls
 * @property \Cake\ORM\Association\HasMany $UserProfiles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Answers', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('PollStatuses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Polls', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasOne('UserProfiles', [
            'foreignKey' => 'user_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        /* $validator
             ->uuid('auth_key')
             ->requirePresence('auth_key', 'create')
             ->notEmpty('auth_key');

         $validator
             ->integer('role')
             ->requirePresence('role', 'create')
             ->notEmpty('role');

         $validator
             ->dateTime('deleted')
             ->allowEmpty('deleted');*/

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

        return $rules;
    }

    /**
     * @param Event $event
     * @return bool
     */
    public function beforeSave(Event $event)
    {
        $user = $event->data['entity'];
        if ($user->isNew()) {
            $user->auth_key = Text::uuid();
            $user->role = 0;
        }
        return true;
    }
}
