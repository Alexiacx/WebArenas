<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\I18n\Time;
define("VUE", 2);
define("HP_MAX", 5);
define("HP_CUR", 5);
define("FORCE", 1);
define("WIDTH", 14);
define("HEIGHT", 9);
define("MAX_PA", 5);
define("TPS_RECUP_PA", 60);
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
            	// Dans le cas d'un level up et d'une montée en compétences
            	if (isset($this->request->data['skill_sight'])) {
            		$this->request->data['skill_sight'] = $combattant['0']['skill_sight'] + 1;
            		$this->request->data['level'] = $combattant['0']['level'] + 1;
            		$fighter = $this->Fighters->patchEntity($combattant['0'], $this->request->data);
            	} 
                elseif (isset($this->request->data['skill_strength'])) {
            		$this->request->data['skill_strength'] = $combattant['0']['skill_strength'] + 1;
            		$this->request->data['level'] = $combattant['0']['level'] + 1;
            		$fighter = $this->Fighters->patchEntity($combattant['0'], $this->request->data);
            	} 
                elseif (isset($this->request->data['skill_health'])) {
            		$this->request->data['skill_health'] = $combattant['0']['skill_health'] + 3;
            		$this->request->data['current_health'] = $this->request->data['skill_health'];
            		$this->request->data['level'] = $combattant['0']['level'] + 1;
            		$fighter = $this->Fighters->patchEntity($combattant['0'], $this->request->data);
            	}
                //Dans le cas d'une création de personnage
            	else {
            		$fighter = $this->Fighters->newEntity();
            		$i=0;
            		do {
            			$x = rand(0,WIDTH);
    	        		$y = rand(0,HEIGHT);
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
    	                'skill_sight' => VUE,
    	                'skill_strength' => FORCE,
    	                'skill_health' => HP_MAX,
    	                'current_health' => HP_CUR,
                        'next_action_time' => new Time(time()),
    	            ];
    	            $fighter = $this->Fighters->patchEntity($fighter, $newFighter);
            	}
                //On enregistre le nouveau combattant ou le level up
                if ($this->Fighters->save($fighter)) {
                    $this->Flash->success(__('Votre combattant a bien été enregistré.'));

                    if(isset($newFighter)) {
                        //Ajout de l'évènement
                        $this->loadModel('Events');
                        $event = $this->Events->newEntity();
                        $data = ['name' => $newFighter['name'].' vient d\'entrer dans l\'arène', 'coordinate_x' => $x, 'coordinate_y' => $y, 'date' => date("Y-m-d H:i:s", time())];
                        $event = $this->Events->patchEntity($event, $data);
                        if ($this->Events->save($event)) {
                            $this->Flash->success(__('Evènement enregistré dans le journal'));
                        } else {
                            $this->Flash->error(__('L\'évènement n\'a pas pu être enregistré dans le journal'));
                        }
                    }

                } else {
                    $this->Flash->error(__('Votre combattant n\'a pas pu être enregistré. Essayez encore une fois.'));
                }
            }
            //On définit les variables pour notre vue
            if(isset($combattant['0'])) {
            	$combattant['0']['xp_levelup'] = $combattant['0']['xp'] - ($combattant['0']['level']-1)*4;
    			$this->set("combattant", $combattant['0']);
            }
    }

    public function sight()
    {
        //On charge nos modèles
        $this->loadModel('Fighters');
        $combattant = $this->Fighters->findByPlayerId($this->Auth->user('id'));
        
        if($combattant !=null) {
            //On passe la dernière date d'action du commbattant en timestamp
            $lastActionDate = new Time($combattant['0']['next_action_time']);
            $lastAction = $lastActionDate->toUnixString();
            
            //On définit nos variables PA pour le HTML
            $this->set("PA", ['maxPA' => MAX_PA, "tpsRecupPA" => TPS_RECUP_PA]);

            if ($this->request->is('post')) {
                //On définit le nouveau repère pour calculer les pas
                if($lastAction <= time()-TPS_RECUP_PA) {
                    if ($lastAction < time()-MAX_PA*TPS_RECUP_PA) {
                        $newDate = new Time(time()-(MAX_PA-1)*TPS_RECUP_PA);
                    } else {
                        $newDate = new Time($lastAction+TPS_RECUP_PA);
                    }
                    $newDate->format("Y-m-d H:i:s");
                    //Dans le cas d'un déplacement
                    if(isset($this->request->data['move'])) {
                        //On vérifie si le combattant peut bien aller sur la case
                        switch ($this->Fighters->doMove($this->request->data['move'], $combattant['0'], WIDTH, HEIGHT)) {
                            case 0 :
                                $this->Flash->error(__('Déplacement impossible. Vous sortez de l\'arène'));
                                break;
                            case 1 :
                                $move = ['coordinate_y' => $combattant['0']['coordinate_y']+1, 'next_action_time' => $newDate];
                                break;
                            case 2 :
                                $move = ['coordinate_y' => $combattant['0']['coordinate_y']-1, 'next_action_time' => $newDate];
                                break;
                            case 3 :
                                $move = ['coordinate_x' => $combattant['0']['coordinate_x']-1, 'next_action_time' => $newDate];
                                break;
                            case 4 :
                                $move = ['coordinate_x' => $combattant['0']['coordinate_x']+1, 'next_action_time' => $newDate];
                                break;
                            case 5 :
                                $this->Flash->error(__('Déplacement impossible. Il y a déjà un ennemi à cet emplacement'));
                                break;
                        }
                        if(isset($move)) {
                            //On enregistre et met à jour la position et la barre de PA
                            $moving = $this->Fighters->patchEntity($combattant['0'], $move);
                            if ($this->Fighters->save($moving)) {
                                $this->Flash->success(__('Déplacement effectué'));
                            } else {
                                $this->Flash->error(__('Le déplacement n\'a pas pu être fait (Erreur sql)'));;
                            }
                        }
                    }
                    //De même, dans el cas d'une attaque
                    if(isset($this->request->data['attack'])) {
                        //On vérifie que le combattant peut bien attaqué et qu'il n'a pas loupé son coup, ce qui lui coute 1 PA quand même
                        $ennemy = $this->Fighters->doAttack($this->request->data['attack'], $combattant['0'], WIDTH, HEIGHT);
                        if ($ennemy['miss']) {
                            $usedPA = ['next_action_time' => $newDate];
                            $missedAttack = $this->Fighters->patchEntity($combattant['0'], $usedPA);
                            if ($this->Fighters->save($missedAttack)){
                                $this->Flash->error(__('Vous avez manqué votre adversaire'));
                            } else {
                                $this->Flash->error(__('Votre attaque n\'a pas pu se faire (Erreur sql)'));
                            }      
                        } 
                        elseif ($ennemy) {
                            //Selon les points de vie de l'ennemi, on a 2 situations : blessé ou mort
                            $healthDown = ['current_health' => $ennemy['current_health']-$combattant['0']['skill_strength']];
                            $attacked = $this->Fighters->patchEntity($ennemy, $healthDown);
                            //
                            if($healthDown['current_health'] <= 0) {
                                $xpWin = $ennemy['level']+1;
                            } else {
                                $xpWin = 1;
                            }
                            $xpTot = ['xp' => $combattant['0']['xp']+$xpWin, 'next_action_time' => $newDate];
                            $attacking = $this->Fighters->patchEntity($combattant['0'], $xpTot);
                            if($healthDown['current_health'] <= 0) {
                                //Dans le cas où on tue l'ennemi
                                if ($this->Fighters->save($attacking) && $this->Fighters->delete($attacked)) {
                                    $this->Flash->success(__('Vous avez tué un ennemi ! Bonus xp !'));

                                    //Ajout de l'évènement
                                    $this->loadModel('Events');
                                    $event = $this->Events->newEntity();
                                    $data = ['name' => $combattant['0']['name'].' vient de tuer '.$ennemy['name'], 'coordinate_x' => $ennemy['coordinate_x'], 'coordinate_y' => $ennemy['coordinate_y'], 'date' => date("Y-m-d H:i:s", time())];
                                    $event = $this->Events->patchEntity($event, $data);
                                    if ($this->Events->save($event)) {
                                        $this->Flash->success(__('Evènement enregistré dans le journal'));
                                    } else {
                                        $this->Flash->error(__('L\'évènement n\'a pas pu être enregistré dans le journal'));
                                    }

                                } else {
                                    $this->Flash->error(__('Votre attaque n\'a pas pu se faire (Erreur sql)'));
                                }
                                //Dans le cas où on blesse l'ennemi
                            } elseif ($this->Fighters->save($attacking) && $this->Fighters->save($attacked)) {
                                $this->Flash->success(__('Attaque réussie'));

                                //Ajout de l'évènement
                                $this->loadModel('Events');
                                $event = $this->Events->newEntity();
                                $data = ['name' => $combattant['0']['name'].' vient d\'attaquer '.$ennemy['name'], 'coordinate_x' => $ennemy['coordinate_x'], 'coordinate_y' => $ennemy['coordinate_y'], 'date' => date("Y-m-d H:i:s", time())];
                                $event = $this->Events->patchEntity($event, $data);
                                if ($this->Events->save($event)) {
                                    $this->Flash->success(__('Evènement enregistré dans le journal'));
                                } else {
                                    $this->Flash->error(__('L\'évènement n\'a pas pu être enregistré dans le journal'));
                                } 

                            } else {
                                $this->Flash->error(__('Votre attaque n\'a pas pu se faire (Erreur sql)'));
                            }
                        } else {
                            $this->Flash->error(__('Il n\'y a pas d\'ennemis à cet endroit'));
                        }
                    }
                } else {
                    $this->Flash->error(__('Vous n\'avez plus de PA pour vous déplacer ou attaquer'));
                }
            }

            //On définit les différentes variables envoyés pour la vue
            $combattant = $this->Fighters->findByPlayerId($this->Auth->user('id'));
            $figX = $combattant['0']['coordinate_x'];
            $figY = $combattant['0']['coordinate_y'];
            $sight = $combattant['0']['skill_sight'];
            $ennemyInSight = $this->Fighters->inSight($figX, $figY, $sight);
            $this->set("ennemies", $ennemyInSight);
            $this->set("combattant", $combattant['0']);
        }
    }

    public function diary()
    {
    	$this->loadModel('Events');
    	$journal=$this->Events->getDiary();
    	$this->set("journal",$journal);
    }

    public function accueil()
    {
        if($this->Auth->user('id') != null) {
            $this->set("userIn", $this->Auth->user('id'));
        }
    }
}
