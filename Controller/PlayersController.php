<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; 

/**
 * Players Controller
 *
 * @property \App\Model\Table\PlayersTable $Players
 */
class PlayersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $players = $this->paginate($this->Players);

        $this->set(compact('players'));
        $this->set('_serialize', ['players']);
    }

    /**
     * View method
     *
     * @param string|null $id Player id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $player = $this->Players->get($id, [
            'contain' => ['Fighters']
        ]);

        $this->set('player', $player);
        $this->set('_serialize', ['player']);
    }


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

        /**
     * logout method
     *
     */
    public function logout()
    {
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
     * Edit method
     *
     * @param string|null $id Player id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $player = $this->Players->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $player = $this->Players->patchEntity($player, $this->request->data);
            if ($this->Players->save($player)) {
                $this->Flash->success(__('The player has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The player could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('player'));
        $this->set('_serialize', ['player']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Player id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $player = $this->Players->get($id);
        if ($this->Players->delete($player)) {
            $this->Flash->success(__('The player has been deleted.'));
        } else {
            $this->Flash->error(__('The player could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
