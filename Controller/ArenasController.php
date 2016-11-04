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

                return $this->redirect(['action' => 'fighter']);
            } else {
                $this->Flash->error(__('The fighter could not be saved. Please, try again.'));
            }
        }
        if(isset($combattant['0'])) {
        	$combattant['0']['xp'] = $combattant['0']['xp'] - ($combattant['0']['level']-1)*4;
			$this->set("combattant", $combattant['0']);
        }
}

public function sight()
{

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
