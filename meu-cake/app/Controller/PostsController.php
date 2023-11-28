<?php

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Posts';

    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true; // Admin pode acessar todas actions
        }
        return false; // Os outros usuários não podem
    }

    public function beforeFilter() {
        parent::beforeFilter();
    
        
        $this->Auth->allow(['index', 'view']);
    
        
        if ($this->Auth->user()) {
            // Se for um administrador, permitir todas as ações
            if ($this->Auth->user('role') === 'admin') {
                $this->Auth->allow(['delete', 'add', 'edit']);
            } 
        }
    }
    
    

    function index() {
        $this->set('posts', $this->Post->find('all'));
    }
    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); // Adicionada essa linha
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error('Unable to add your post.');
        }
        $this ->render();
    }

    function delete($id) {
        
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }else{
        
            if ($this->Post->delete($id)) {
                $this->Flash->success('The post with id: ' . $id . ' has been deleted.');
                $this->redirect(array('action' => 'index'));
            }$this->Flash->error('The post with id: ' . $id . ' could not be deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }   
    function edit(){
        if (!$this->request->is('put', 'post')) {
            throw new MethodNotAllowedException();
        }else{
            $id=$this->request->data['Post']['id'];
            $post=$this->Post->findById($id);
            if(!$post){
                throw new NotFoundException(__('Invalid post'));
            }
            if($this->Post->save($this->request->data)){
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
            
        }   

    }

    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
            'authorize' => array('Controller') // Adicionamos essa linha
        )
    );
    
    

   

}