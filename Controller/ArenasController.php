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

public function adduser()
{

}
public function fighter()
{
	$this->loadModel('Fighters');
	$combattant = $this->Fighters->findByPlayerId($this->Auth->user('id'));
	$this->set("combattant", $combattant);
        if ($this->request->is('post')) {
        	if ($this->request->data['level']) {
        		$this->request->data['level'] = $this->request->data['level']+$combattant['0']['level'];
        		$fighter = $this->Fighters->patchEntity($combattant['0'], $this->request->data);
        	}
        	else {
        		$fighter = $this->Fighters->newEntity();
	            $newFighter = [
	                'name' => $this->request->data['name'],
	                'player_id' => $this->Auth->user('id'),
	                'coordinate_x' => 2,
	                'coordinate_y' => 2,
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
                $this->Flash->success(__('The fighter has been saved.'));

                return $this->redirect(['action' => 'fighter']);
            } else {
                $this->Flash->error(__('The fighter could not be saved. Please, try again.'));
            }
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
	var_dump($journal);
}
public function help()
{

}
}
