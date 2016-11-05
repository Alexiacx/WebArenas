<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fighters Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Players
 * @property \Cake\ORM\Association\BelongsTo $Guilds
 * @property \Cake\ORM\Association\HasMany $Messages
 * @property \Cake\ORM\Association\HasMany $Tools
 *
 * @method \App\Model\Entity\Fighter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Fighter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Fighter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Fighter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Fighter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Fighter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Fighter findOrCreate($search, callable $callback = null)
 */
class FightersTable extends Table
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

        $this->table('fighters');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Players', [
            'foreignKey' => 'player_id',
            'joinType' => 'INNER'
        ]);
    }

    public function findById($fid)
    {
        $combattant = $this->find('all', ['all',
            'conditions' => [
            'Fighters.id =' => $fid,
            ]
        ]);
        return $combattant->toArray();
    }

    public function findByPlayerId($userId)
    {
        $combattant = $this->find('all', ['all',
            'conditions' => [
            'Fighters.player_id =' => $userId,
            ]
        ]);
        return $combattant->toArray();
    }

    public function positionNotUsed($x, $y) {

        $positionUsed = $this->find('all', ['all',
            'conditions' => [
            'Fighters.coordinate_x =' => $x,
            'Fighters.coordinate_y =' => $y,
            ]
        ]);

        if(isset($positionUsed)) {
            return false;
        } else {
            return true;
        }
    }

    public function inSight($x, $y, $sight) {

        $fightersInSight = $this->find('all', ['all',
            'conditions' => [
            'ABS(Fighters.coordinate_x - '.$x.') + ABS(Fighters.coordinate_y - '.$y.') <=' => $sight,
            'ABS(Fighters.coordinate_x - '.$x.') + ABS(Fighters.coordinate_y - '.$y.') !=' => 0,
            ]
        ]);
        return $fightersInSight->toArray();
    }

    public function doMove($direction, $combattant, $width, $height)
    {
        switch ($direction) {
            case 'up' :
                if ($combattant['coordinate_y']+1 > $height) {
                    return 0;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x'],
                    'Fighters.coordinate_y =' => $combattant['coordinate_y']+1,
                    ]
                ]);
                if($potEnnemy->toArray() != null) {
                    return 5;
                } else {
                    return 1;
                }
                break;
            case 'down' :
                if ($combattant['coordinate_y']-1 < 0) {
                    return 0;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x'],
                    'Fighters.coordinate_y =' => $combattant['coordinate_y']-1,
                    ]
                ]);
                if($potEnnemy->toArray() != null) {
                    return 5;
                } else {
                    return 2;
                }
                break;
            case 'left' :
                if ($combattant['coordinate_x']-1 < 0) {
                    return 0;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x']-1,
                    'Fighters.coordinate_y =' => $combattant['coordinate_y'],
                    ]
                ]);
                if($potEnnemy->toArray() != null) {
                    return 5;
                } else {
                    return 3;
                }
                break;
            case 'right' :
                if ($combattant['coordinate_x']+1 > $width) {
                    return 0;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x']+1,
                    'Fighters.coordinate_y =' => $combattant['coordinate_y'],
                    ]
                ]);
                if($potEnnemy->toArray() != null) {
                    return 5;
                } else {
                    return 4;
                }
                break;
        }
    }

    public function doAttack($direction, $combattant, $width, $height)
    {
        $d20 = rand(1,20);
        switch ($direction) {
            case 'up' :
                if ($combattant['coordinate_y']+1 > $height) {
                    return 0;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x'],
                    'Fighters.coordinate_y =' => $combattant['coordinate_y']+1,
                    ]
                ]);
                $attacked = $potEnnemy->toArray();
                if($attacked != null) {
                    if ($d20 > 10-$combattant['level']+$attacked['0']['level']) {
                        return $attacked['0'];
                    } else {
                        $attacked['0']['miss'] = 1;
                        return $attacked['0'];
                    };
                }
                break;
            case 'down' :
                if ($combattant['coordinate_y']-1 < 0) {
                    return 0;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x'],
                    'Fighters.coordinate_y =' => $combattant['coordinate_y']-1,
                    ]
                ]);
                $attacked = $potEnnemy->toArray();
                if($attacked != null) {
                    if ($d20 > 10-$combattant['level']+$attacked['0']['level']) {
                        return $attacked['0'];
                    } else {
                        $attacked['0']['miss'] = 1;
                        return $attacked['0'];
                    }
                }
                break;
            case 'left' :
                if ($combattant['coordinate_x']-1 < 0) {
                    return 0;;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x']-1,
                    'Fighters.coordinate_y =' => $combattant['coordinate_y'],
                    ]
                ]);
                $attacked = $potEnnemy->toArray();
                if($attacked != null) {
                    if ($d20 > (10-$combattant['level']+$attacked['0']['level'])) {
                        return $attacked['0'];
                    } else {
                        $attacked['0']['miss'] = 1;
                        return $attacked['0'];
                    }
                } else return 0;
                break;
            case 'right' :
                if ($combattant['coordinate_x']+1 > $width) {
                    return 0;
                }
                $potEnnemy = $this->find('all', ['all',
                    'conditions' => [
                    'Fighters.coordinate_x =' => $combattant['coordinate_x']+1,
                    'Fighters.coordinate_y =' => $combattant['coordinate_y'],
                    ]
                ]);
                $attacked = $potEnnemy->toArray();
                if($attacked != null) {
                    if ($d20 > 10-$combattant['level']+$attacked['0']['level']) {
                        return $attacked['0'];
                    } else {
                        $attacked['0']['miss'] = 1;
                        return $attacked['0'];
                    }
                }
                break;
        }
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
            ->integer('coordinate_x')
            ->requirePresence('coordinate_x', 'create')
            ->notEmpty('coordinate_x');

        $validator
            ->integer('coordinate_y')
            ->requirePresence('coordinate_y', 'create')
            ->notEmpty('coordinate_y');

        $validator
            ->integer('level')
            ->requirePresence('level', 'create')
            ->notEmpty('level');

        $validator
            ->integer('xp')
            ->requirePresence('xp', 'create')
            ->notEmpty('xp');

        $validator
            ->integer('skill_sight')
            ->requirePresence('skill_sight', 'create')
            ->notEmpty('skill_sight');

        $validator
            ->integer('skill_strength')
            ->requirePresence('skill_strength', 'create')
            ->notEmpty('skill_strength');

        $validator
            ->integer('skill_health')
            ->requirePresence('skill_health', 'create')
            ->notEmpty('skill_health');

        $validator
            ->integer('current_health')
            ->requirePresence('current_health', 'create')
            ->notEmpty('current_health');

        $validator
            ->dateTime('next_action_time')
            ->allowEmpty('next_action_time');

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
        $rules->add($rules->existsIn(['player_id'], 'Players'));

        return $rules;
    }
}
