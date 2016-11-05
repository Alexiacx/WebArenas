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
            //var_dump($this->Auth->identify()); die();
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
        $player = $this->Players->newEntity();
        if ($this->request->is('post')) {
            if ($this->request->data['password'] == $this->request->data['password_confirm']) {
                $player = $this->Players->patchEntity($player, $this->request->data);
                if ($this->Players->save($player)) {
                    $this->Flash->success(__('The player has been saved.'));

                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('The player could not be saved. Please, try again.'));
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
        $length = 20;
        $this->loadModel('Players');
        

        if ($this->request->is('post')) {
            $user = $this->Players->checkUser($this->request->data['email']);
            if($user) {
                $specialchars = array('&', '~', '"', '\'', '(', '{', '[', '|', ']', '}', ')', '=', '-', '+', '*', '/', '\\', '_', '@', '%', '$', '!', ';', '.', ',', ':', '?', '§', '°', '€', '£', '¤', 'µ', '#', '<', '>');
                $chars = array_merge(range('a', 'z'), range('A', 'Z'), range('0', '9'), $specialchars);
                shuffle($chars);
                $newPw = substr(implode($chars), 0, $length);

                $playerReset = $this->Players->patchEntity($user['0'], ['password' => $newPw]);
                if ($this->Players->save($playerReset)) {

                    //Envoi de l'email
                    $email = new Email('default');
                    $email->from('mpingkachu@gmail.com')
                        ->to($this->request->data['email'])
                        ->subject('Reset password')
                        ->send('Voici votre nouveau mot de passe : '.$newPw);

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
