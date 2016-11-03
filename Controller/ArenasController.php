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
	var_dump("ALLLLEEEEEEZ");
	if ($this->request->is('post')) {
		var_dump("YESSSSSSS");
		$user = $this->Auth->identify();
		var_dump($user);
		var_dump("TRUE = YIPIIIIII");
		var_dump("FALSE = OUIIIIIIIIIIIN");
		if($user) {
			$this->Auth->setUser($user);
			return $this->rediurect($this->Auth->redirectUrl());
		} else {
			$this->Flash->error(__("Nom d'utilisateur ou mdp incorrect"), [
				'key' => 'auth'
			]);
		}
	}
	/*$email=$this->request->data['email'];
	$password=$this->request->data['password'];*/
}

/*public function exit(){
    return $this->redirect($this->Auth->exit());
}*/


public function adduser()
{
	$name=$this->request->data['name'];
	$surname=$this->request->data['surname'];
	$nationality=$this->request->data['nationality'];
	$city=$this->request->data['city'];
	$age=$this->request->data['age'];
	$sexe=$this->request->data['sexe'];
	$email=$this->request->data['email'];
	$password=$this->request->data['password'];
	$passwordconfirme=$this->request->data['passwordconfirme'];
}
public function fighter()
{

}
public function sight()
{

}
public function diary()
{
	$fighterid=1;
	$this->loadModel('Events');
	$journal=$this->Events->getDiaryForFighter($fighterid);
	$this->set("journal",$journal);
}
public function help()
{

}
}
