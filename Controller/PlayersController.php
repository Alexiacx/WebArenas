<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event; 
use Cake\Network\Exception;
use Cake\Utility\Text;
// use Google_Client;
// use Google_Service_Oauth2;

// define('GOOGLE_OAUTH_CLIENT_ID', '486878319542-q2htqvo2913us04c2srjjhe2kq44ptj4.apps.googleusercontent.com');
// define('GOOGLE_OAUTH_CLIENT_SECRET', 'of0zso-ThVlukCI_I2anLSra');
// define('GOOGLE_OAUTH_REDIRECT_URI', 'http://localhost:8888/web-Arena/Players/google_login');

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

    // public function googlelogin()
    // {
    //     $client = new Google_Client();
    //     $client->setClientId(GOOGLE_OAUTH_CLIENT_ID);
    //     $client->setClientSecret(GOOGLE_OAUTH_CLIENT_SECRET);
    //     $client->setRedirectUri(GOOGLE_OAUTH_REDIRECT_URI);
     
    //     $client->setScopes(array(
    //         "https://www.googleapis.com/auth/userinfo.profile",
    //         'https://www.googleapis.com/auth/userinfo.email'
    //     ));
    //     $url = $client->createAuthUrl();
    //     $this->redirect($url);
    // }

    // public function google_login()
    // {
    //     $client = new Google_Client();
    //     /* Création de notre client Google */
    //                 $client->setClientId(GOOGLE_OAUTH_CLIENT_ID);
    //                 $client->setClientSecret(GOOGLE_OAUTH_CLIENT_SECRET);
    //                 $client->setRedirectUri(GOOGLE_OAUTH_REDIRECT_URI);
         
    //                 $client->setScopes(array(
    //                     "https://www.googleapis.com/auth/userinfo.profile",
    //                     'https://www.googleapis.com/auth/userinfo.email'
    //                 ));
    //                 $client->setApprovalPrompt('auto');
         
    //     /* si dans l'url le paramètre de retour Google contient 'code' */
    //                 if (isset($this->request->query['code'])) {
    //     // Alors nous authentifions le client Google avec le code reçu
    //                     $client->authenticate($this->request->query['code']);
    //     // et nous plaçons le jeton généré en session
    //                     $this->request->Session()->write('access_token', $client->getAccessToken());
    //                 }
         
    //     /* si un jeton est en session, alors nous le plaçons dans notre client Google */
    //                 if ($this->request->Session()->check('access_token') && ($this->request->Session()->read('access_token'))) {
    //                     $client->setAccessToken($this->request->Session()->read('access_token'));
    //                 }
    //     /* Si le client Google a bien un jeton d'accès valide */
    //                 if ($client->getAccessToken()) {
    //     // alors nous écrivons le jeton d'accès valide en session
    //                     $this->request->Session()->write('access_token', $client->getAccessToken());
    //     // nous créons une requête OAuth2 avec le client Google paramétré
    //                     $oauth2 = new Google_Service_Oauth2($client);
    //     // et nous récupérons les informations de l'utilisateur connecté
    //                     $user = $oauth2->userinfo->get();
    //                     try {
    //                         if (!empty($user)) {
    //     // si l'utilisateur est bien déclaré, nous vérifions si dans notre table Users il existe l'email de l'utilisateur déclaré ou pas
    //                             $result = $this->Users->find('all')
    //                                                   ->where(['email' => $user['email']])
    //                                                   ->first();
    //                             if ($result) {
    //     // si l'email existe alors nous déclarons l'utilisateur comme authentifié sur CakePHP
    //                                 $this->Auth->setUser($result->toArray());
    //     // et nous redirigeons vers la page de succès de connexion
    //                                 $this->redirect($this->Auth->redirectUrl());
    //                             } else {
    //     // si l'utilisateur n'est pas dans notre utilisateur, alors nous le créons avec les informations récupérées par Google+
    //                                 $data = array();
    //                                 $data['email'] = $user['email'];
    //                                 $data['first_name'] = $user['givenName'];
    //                                 $data['last_name'] = $user['familyName'];
    //                                 $data['social_id'] = $user['id'];
    //                                 $data['avatar'] = $user['picture'];
    //                                 $data['link'] = $user['link'];
    //                                 $data['uuid'] = Text::uuid();
    //                                 $entity = $this->Users->newEntity($data);
    //                                 if ($this->Users->save($entity)) {
    //     // et ensuite nous déclarons l'utilisateur comme authentifié sur CakePHP
    //                                     $data['id'] = $entity->id;
    //                                     $this->Auth->setUser($data);
    //                                     $this->redirect($this->Auth->redirectUrl());
    //                                 } else {
    //                                     $this->Flash->set('Erreur de connection');
    //     // et nous redirigeons vers la page de succès de connexion
    //                                     $this->redirect(['action' => 'login']);
    //                                 }
    //                             }
    //                         } else {
    //     // si l'utilisateur n'est pas valide alors nous affichons une erreur
    //                             $this->Flash->set('Erreur les informations Google n\'ont pas été trouvée');
    //                             $this->redirect(['action' => 'login']);
    //                         }
    //                     } catch (\Exception $e) {
    //                         $this->Flash->set('Grosse erreur Google, ca craint');
    //                         return $this->redirect(['action' => 'login']);
    //                     }
    //                 }
                
    // }

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
        $this->request->session()
                  ->destroy('access_token');
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
