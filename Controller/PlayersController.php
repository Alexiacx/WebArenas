<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; 
use Cake\Network\Exception;
use Cake\Utility\Text;
use Cake\Mailer\Email;
/**
 * Players Controller
 *
 * @property \App\Model\Table\PlayersTable $Players
 */
class PlayersController extends AppController
{

    /**
     * login method
     *
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(
                    __("Nom d'utilisateur ou mdp incorrect")
                );
            }
        }
    }

    public function gitlog()
    {
        if($this->Auth->user('id') != null) {
            $this->set("userIn", $this->Auth->user('id'));
        }
    }

        /**
     * logout method
     *
     */
    public function logout()
    {
        $this->Flash->success('Vous êtes bien déconnecté');
        return $this->redirect($this->Auth->logout());
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //On créé une nouvelle entité joueur pour l'enregistrer ensuite en base
        $player = $this->Players->newEntity();
        if ($this->request->is('post')) {
            //On verifie la confirmation du mot de passe
            if ($this->request->data['password'] == $this->request->data['password_confirm']) {
                $player = $this->Players->patchEntity($player, $this->request->data);
                if ($this->Players->save($player)) {
                    $this->Flash->success(__('Votre compte a bien été enregistré'));
                    //Si le joueur a bien été enregistré, on le redirige
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Votre compte n\'a pas pu être enregistré, essayez encore.'));
                }
            }
            
        }
    }

        /**
     * reset password method
     *
     */
    public function resetpw()
    {
        $lengthNewPW = 20;
        $this->loadModel('Players');
        

        if ($this->request->is('post')) {
            $user = $this->Players->checkUser($this->request->data['email']);
            //On vérifie que on a un email correspondant en base
            if($user) {
                //On définit un nouveau mot de passe aléatoire de 20 caractère
                $specialchars = array('&', '~', '"', '\'', '(', '{', '[', '|', ']', '}', ')', '=', '-', '+', '*', '/', '\\', '_', '@', '%', '$', '!', ';', '.', ',', ':', '?', '§', '°', '€', '£', '¤', 'µ', '#', '<', '>');
                $chars = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'), $specialchars);
                shuffle($chars);
                $newPw = substr(implode($chars), 0, $lengthNewPW);
                //On enregistre ce mot de passe en base
                $playerReset = $this->Players->patchEntity($user['0'], ['password' => $newPw]);
                if ($this->Players->save($playerReset)) {

                    //Envoi de l'email par smtp, configurer dans app.php
                    $email = new Email();
                    $email->transport('mailjet');
                    try {
                        $res = $email->from(['mpingkachu@gmail.com' => "webArena"])
                              ->to([$this->request->data['email'] => $user['0']['id']])
                              ->subject('Reset password')                   
                              ->send('Voici votre nouveau mot de passe : '.$newPw);
                    } catch (Exception $e) {
                        echo 'Exception : ',  $e->getMessage(), "\n";
                        return $this->redirect(['controller' => 'Arenas', 'action' => 'home']);
                    }

                    $this->Flash->success(__('Un email vous a été envoyé pour récupérer votre nouveau mot de passe.'));
                    return $this->redirect(['controller' => 'Arenas', 'action' => 'home']);
                } else {
                    $this->Flash->error(__('Une erreur s\'est produite, veuillez réessayer'));
                }
            } else {
                $this->Flash->error(__('Cette adresse mail n\'existe pas en base'));
            }
        }
    }

    public function beforeFilter (Event $event) {
            parent::beforeFilter($event);
            $this->Auth->allow('login' , 'logout' , 'add');

        }
    public function initialize () {
            parent::initialize();
            $this->Auth->allow('login' , 'logout' , 'add');

        }

}
