<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; 
use Cake\Network\Exception;
use Cake\Utility\Text;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;


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


    public function beforeFilter (Event $event) {
            parent::beforeFilter($event);
            $this->Auth->allow('login' , 'logout' , 'add');

        }
    public function initialize () {
            parent::initialize();
            $this->Auth->allow('login' , 'logout' , 'add');

        }

}
