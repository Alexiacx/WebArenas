<?php
namespace App\Controller;
use App\Controller\AppController;

/**
* Personal Controller
* User personal interface
*
*/
class ArenasController  extends AppController
{
public function home()
{

}

public function fighter()
{
	$this->loadModel('Fighters');
	$combattant = $this->Fighters->findByPlayerId($this->Auth->user('id'));

        if ($this->request->is('post')) {
        	// var_dump($this->request->data); die;
        	if (isset($this->request->data['skill_sight'])) {
        		$this->request->data['skill_sight'] = $combattant['0']['skill_sight'] + 1;
        		$this->request->data['level'] = $combattant['0']['level'] + 1;
        		$fighter = $this->Fighters->patchEntity($combattant['0'], $this->request->data);
        	} elseif (isset($this->request->data['skill_strength'])) {
        		$this->request->data['skill_strength'] = $combattant['0']['skill_strength'] + 1;
        		$this->request->data['level'] = $combattant['0']['level'] + 1;
        		$fighter = $this->Fighters->patchEntity($combattant['0'], $this->request->data);
        	} elseif (isset($this->request->data['skill_health'])) {
        		$this->request->data['skill_health'] = $combattant['0']['skill_health'] + 3;
        		$this->request->data['current_health'] = $this->request->data['skill_health'];
        		$this->request->data['level'] = $combattant['0']['level'] + 1;
        		$fighter = $this->Fighters->patchEntity($combattant['0'], $this->request->data);
        	}
        	else {
        		$fighter = $this->Fighters->newEntity();
        		$i=0;
        		do {
        			$x = rand(0,14);
	        		$y = rand(0,9);
	        		if ($this->Fighters->positionNotUsed($x, $y)) {
	        			$i=1;
	        		}
        		} while($i = 0);

	            $newFighter = [
	                'name' => $this->request->data['name'],
	                'player_id' => $this->Auth->user('id'),
	                'coordinate_x' => $x,
	                'coordinate_y' => $y,
	                'level' => 1,
	                'xp' => 0,
	                'skill_sight' => 2,
	                'skill_strength' => 1,
	                'skill_health' => 5,
	                'current_health' => 5,
	            ];
	            $fighter = $this->Fighters->patchEntity($fighter, $newFighter);
        	}
            if ($this->Fighters->save($fighter)) {
                $this->Flash->success(__('The fighter has been updated.'));
            } else {
                $this->Flash->error(__('The fighter could not be saved. Please, try again.'));
            }
        }
        if(isset($combattant['0'])) {
        	$combattant['0']['xp_levelup'] = $combattant['0']['xp'] - ($combattant['0']['level']-1)*4;
			$this->set("combattant", $combattant['0']);
        }
}

public function sight()
{
    $this->loadModel('Fighters');
    $combattant = $this->Fighters->findByPlayerId($this->Auth->user('id'));
    $this->loadModel('Events');

    $figX = $combattant['0']['coordinate_x'];
    $figY = $combattant['0']['coordinate_y'];
    $sight = $combattant['0']['skill_sight'];
    $width = 15;
    $height = 10;

    if ($this->request->is('post')) {
        if(isset($this->request->data['move'])) {
            switch ($this->Fighters->doMove($this->request->data['move'], $combattant['0'])) {
                case 0 :
                    $this->Flash->success(__('Déplacement impossible. Vous sortez de l\'arène'));
                    break;
                case 1 :
                    $moveUp = ['coordinate_y' => $combattant['0']['coordinate_y']+1];
                    $move = $this->Fighters->patchEntity($combattant['0'], $moveUp);
                    break;
                case 2 :
                    $moveDown = ['coordinate_y' => $combattant['0']['coordinate_y']-1];
                    $move = $this->Fighters->patchEntity($combattant['0'], $moveDown);
                    break;
                case 3 :
                    $moveLeft = ['coordinate_x' => $combattant['0']['coordinate_x']-1];
                    $move = $this->Fighters->patchEntity($combattant['0'], $moveLeft);
                    break;
                case 4 :
                    $moveRight = ['coordinate_x' => $combattant['0']['coordinate_x']+1];
                    $move = $this->Fighters->patchEntity($combattant['0'], $moveRight);
                    break;
                case 5 :
                    $this->Flash->error(__('Déplacement impossible. Il y a déjà un ennemi à cet emplacement'));
                    break;
            }
            if(isset($move)) {
                if ($this->Fighters->save($move)) {
                    $this->Flash->success(__('Déplacement effectué'));
                } else {
                    $this->Flash->error(__('Le déplacement n\'a pas pu être fait (Erreur sql)'));;
                }
            }
        }
        if(isset($this->request->data['attack'])) {
            $ennemy = $this->Fighters->doAttack($this->request->data['attack'], $combattant['0']);
            if ($ennemy['miss']) {
                $this->Flash->error(__('Vous avez manqué votre adversaire'));
            } elseif ($ennemy) {
                $healthDown = ['current_health' => $ennemy['current_health']-$combattant['0']['skill_strength']];
                $attacked = $this->Fighters->patchEntity($ennemy, $healthDown);
                if($healthDown['current_health'] <= 0) {
                    $xpWin = $ennemy['level']+1;
                } else {
                    $xpWin = 1;
                }
                $xpTot = ['xp' => $combattant['0']['xp']+$xpWin];
                $attacking = $this->Fighters->patchEntity($combattant['0'], $xpTot);
                if($healthDown['current_health'] <= 0) {
                    if ($this->Fighters->save($attacking) && $this->Fighters->delete($attacked)) {
                        $this->Flash->success(__('Vous avez tué un ennemi ! Bonus xp !'));
                    } else {
                        $this->Flash->error(__('Votre attaque n\'a pas pus se faire (Erreur sql)'));
                    }
                } elseif ($this->Fighters->save($attacking) && $this->Fighters->save($attacked)) {
                    $this->Flash->success(__('Attaque réussie'));
                } else {
                    $this->Flash->error(__('Votre attaque n\'a pas pu se faire (Erreur sql)'));
                }
            } else {
                $this->Flash->error(__('Il n\'y a pas d\'ennemis à cet endroit'));
            }
        }
    }
    $ennemyInSight = $this->Fighters->inSight($figX, $figY, $sight);
    $this->set("ennemies", $ennemyInSight);
    $this->set("combattant", $combattant['0']);
}

public function diary()
{
	$this->loadModel('Events');
	$journal=$this->Events->getDiary();
	$this->set("journal",$journal);
}
public function help()
{

}
}
