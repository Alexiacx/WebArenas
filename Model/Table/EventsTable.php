<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null)
 */
class EventsTable extends Table
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

        $this->table('events');
        $this->displayField('name');
        $this->primaryKey('id');
    }

    /**
     * Getting diary
     *
     * @param int $fid The fighter we're looking for
     * @return events data
     */
    public function getDiary()
    {
        $day = 24*60*60;
        $journal= $this->find('all', [ 'all',
            'conditions' => [
            'Events.date >=' => date("Y-m-d H:i:s", time()-$day),
            ],
            'order' => ['Events.date DESC']
        ]);

        return $journal->toArray();
    }

    public function actionMessage($name, $x, $y)
    {
        // $event = $this->Events->newEntity();
        // $message = ['name' => $name, 'date' => date("Y-m-d H:i:s", time(), 'coordinate_x' => $x, 'coordinate_y', $y];
        //     $event = $this->Events->patchEntity($event, $message);
        //     if ($this->Events->save($event)) {
        //         $this->Flash->success(__('The event has been saved.'));
        //     } else {
        //         $this->Flash->error(__('The event could not be saved. Please, try again.'));
        //     }
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->dateTime('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->integer('coordinate_x')
            ->requirePresence('coordinate_x', 'create')
            ->notEmpty('coordinate_x');

        $validator
            ->integer('coordinate_y')
            ->requirePresence('coordinate_y', 'create')
            ->notEmpty('coordinate_y');

        return $validator;
    }
}
