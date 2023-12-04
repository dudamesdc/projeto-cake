<?php
class UsersController extends AppController
{
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
        $components = array(
            'Flash',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
                'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
                'authorize' => array('Controller') // Adicionamos essa linha
            )
        );   
    }

    public function isAuthorized($user) {
        // Todos os usuários registrados podem adicionar posts
        if ($this->action === 'view'|| $this->action === 'index') {
            return true;
        }
        // O proprietário do post pode editá-lo e excluí-lo
        if ($this -> action === 'edit' || $this -> action === 'delete' || $this -> action === 'add') {
            $postId = (int) $this->request->params['pass'][0];
            if ( $user['id']===$postId) {
                return true;
            }else{
                $this->Flash->error(__('Você não tem permissão para editar esse post.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
        return parent::isAuthorized($user);
    }
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add() {
        
        if ($this->request->is('post')) {
            $this->User->create();
            $exist = $this->User->findByUsername($this->request->data['User']['username']);
            if($exist){
                $this->Flash->error(__('Usuário já existe'));
            }    
            else if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                $this->redirect(array('controller'=>'posts','url' => 'index'));
            } else {
                
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
    }
    

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    public function login() {
        if ($this->Auth->login()) {
            $this->redirect($this->Auth->redirect());
        } else {
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
    

}