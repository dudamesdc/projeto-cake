<?php
class UsersController extends AppController
{
    public $helpers = array ('Html','Form');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout','dashboard');
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
        $this->loadModel('Profile');
        if ($this->request->is('post')) {
            
            $this->User->create();
            $exist = $this->User->findByCpf($this->request->data['Profile']['cpf']);
            if($exist){
                $this->Flash->error(__('Usuário já existe'));
            }    
            else if ($this->User->save($this->request->data)) {
                $role=$this->request->data('User.role');
                if($role=='admin'){
                    $this->Flash->success(__('admin cadastrado com sucesso'));
                    $this->redirect(array('action' => 'admin_index'));
                
                }
                $this->Flash->success(__('Usuário cadastrado com sucesso'));
                $this->redirect(array('action' => 'user_index'));
            } else {
                
                $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
                $this->redirect(array('controller'=>'posts','url' => 'index'));
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
        if ($this->request->is('post')){
            if ($this->Auth->login()) {
                $role=$this->Auth->user('role');
                    if($role=='admin'){
                    
                        $this->redirect(array('action' => 'admin_index'));
                
                    }
                    
                    $this->redirect((['action' => 'user_index']));
            } else {
                
                $this->Flash->error(__('O usuário não pôde ser salvo. Por favor, tente novamente.'));
                $this->redirect(array('controller'=>'posts','url' => 'index'));
            }
                
             
                $this->Flash->error(__('Usuário ou senha inválidos, tente novamente'));
            
        }
    }
    
    public function logout() {
        $this->Auth->logout();
        $this->redirect(array('controller'=>'posts','action' => 'index'));
    }
    public function admin_index(){
        $this->loadModel('Post');
        $this->set('admin', $this->Auth->user());
        $this->set('posts', $this->Post->find('all'));
    }
    public function deleteUser($id= null){
        if($this->request->is('post')){
            if ($this->User->delete()) {
                $this->Flash->success('The post with id: ' . $id . ' has been deleted.');
                $this->redirect(array('controller'=>'users','action' => 'index'));
            }$this->Flash->error('The post with id: ' . $id . ' could not be deleted.');
            return $this->redirect(array('controller'=>'users','action' => 'admin_index'));
        }
    } 
    public function user_index(){
        
        $this->loadModel('Post');
        $this->set('posts', $this->Post->find('all', array('contain'=>array('User'),'conditions' => array('Post.user_id' => $this->Auth->user('id')))));
        $this->set('user', $this->Auth->user());
    } 
    

}