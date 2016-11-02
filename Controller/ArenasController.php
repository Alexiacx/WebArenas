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
	// Si le Player est déjà connecté, on le redirige
        /*if($this->Session->check('Auth.User')
        {
        	$this->redirect(array('action' => 'diary'));     
        }*/
        if (!empty($this->request->data) && $this->request->is('post')){
        if ($this->request->is('post'))
        {
            if ($this->Auth->home()) {
                $this->Session->setFlash('Bienvenue '.$this->Auth->user('email'));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash("Nom d'user ou mot de passe invalide, réessayer");
            }
        }
}

/*public function exit(){
    return $this->redirect($this->Auth->exit());
}*/

public function adduser()
{
	if($this->request->is('post')){
            $email = $this->Player->findByEmail($this->request->data['Player']['email']);
             
        //Vérifier si Player existe deja
            if($email != null){
                $this->Session->setFlash('Email déjà utilisé, veuillez utiliser un autre e-mail'); 
            }else{
                //Création du profil
                $this->Player->create(array(
                    'email' => $this->request->data['Player']['email'],
                    'password' => $this->request->data['Player']['password']
                ));
                if($this->Player->save($this->request->data)){
                    $this->Session->setFlash("Vous avez créé un nouveau profil, félicitations!");
                    return $this->redirect(array('action' => 'index'));
                }else{
                    //Cas où probleme sur la création du profil
                    $this->Session->setFlash('Le profil n\'a pas été sauvegardé, merci de réessayer.');
                }
                return false;
            }   

      }
}
public function fighter()
{

}
public function sight()
{

}
public function diary()
{

}
public function help()
{

}
}
