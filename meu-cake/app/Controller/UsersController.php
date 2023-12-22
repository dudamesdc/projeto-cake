<?php
class UsersController extends AppController
{
    public $helpers = array ('Html','Form');
    public function beforeFilter() {
        parent::beforeFilter();
        if($this->Auth->user()){
            if($this->Auth->user('role')=='admin'){
                $this->Auth->allow(['user_index', 'view','add','edit','delete','admin_index']);
            }
            else{
                $this->Auth->allow(['user_index', 'view','add','edit','delete']);
            }
            
        }
            
        

        

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
             if ($this->User->save($this->request->data)) {
                $role=$this->request->data('User.role');
                if($role=='admin'){
                    $this->Flash->success(__('admin cadastrado com sucesso'));
                    $this->redirect(array('action' => 'admin_index'));
                
                }
                $this->Flash->error(__('Usuário cadastrado com sucesso'));
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
                $this->redirect(array('action' => 'user_index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
        $this->set('user', $this->Auth->user());
    }

    public function delete($id = null) {
        
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Flash->error(__('Usuário não encontrado'));
            $this->redirect(array('action' => 'admin_index'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('User deleted'));
            $this->redirect(array('action' => 'admin_index'));
        }
        $this->Flash->error(__('User was not deleted'));
        $this->redirect(array('action' => 'admin_index'));
    }
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $role = $this->Auth->user('role');
                if ($role == 'admin') {
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->redirect(array('action' => 'user_index'));
                }
            } else {
                $this->Flash->error(__('Usuário ou senha inválidos, tente novamente'));
                $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            }
        }
    }
    
    
    public function logout() {
        $this->Auth->logout();
        $this->redirect(array('controller'=>'posts','action' => 'index'));
    }

    private function applyFilter(){
        $conditions = array();

        if($this->Session->check('filter')){
            $filtro = $this->Session->read('filter');
            
            if (!empty($filtro['Post']['content'])) {
                $conditions['OR'] = [
                    'Post.body LIKE' => "%{$filtro['Post']['content']}%",
                    'Post.title LIKE' => "%{$filtro['Post']['content']}%"
                ];
                
            }
            if (!empty($filtro['Post']['create'])) {
                 $datai = date('Y-m-d', strtotime(implode('-', $filtro['Post']['create'])));
                 $conditions['Post.created >='] = $datai;
             }
             
             if (!empty($filtro['Post']['end'])) {
                 $dataf = date('Y-m-d', strtotime(implode('-', $filtro['Post']['modified'])));
                 $conditions['Post.modified <='] = $dataf;
             }
         
            
         
            if ($filtro['Post']['is_active']== '1') {
                $conditions['Post.is_active'] = ($filtro['Post']['is_active'] == '1');
            }
         
            
        }
        
        return $conditions;
 }
    public function admin_index($id=null){
        $this->loadModel('Post');
        
        if ($this->request->is('post')) {
                
                
            $filtro = $this->request->data;
            
            $this->Session->write('filter', $filtro);
            

    
        }
        if ($this->request->query('reset')) {
            $this->Session->delete('filter');
            $this->redirect(['action' => 'index']);
        }
        $condi=$this->applyFilter();
         
        $this->Paginator->settings = [
            'limit' => 5,
            'order' => ['Post.created' => 'desc'],
            'conditions' => $condi
        ];

    
        $this->set('admin',  $this->Auth->user());
        $this->set('users', $this->User->find('all'));
        $this->set('posts', $this->Paginator->paginate('Post'));
    }
    
    public function user_index(){
        if ($this->request->is('post')) {
                
                
            $filtro = $this->request->data;
            
            $this->Session->write('filter', $filtro);
            

    
        }
        if ($this->request->query('reset')) {
            $this->Session->delete('filter');
            $this->redirect(['action' => 'index']);
        }
        $condi=$this->applyFilter();
         
        $this->Paginator->settings = [
            'limit' => 5,
            'order' => ['Post.created' => 'desc'],
            'conditions' => $condi
        ];
        $this->loadModel('Post');
        $this->set('posts', $this->Paginator->paginate('Post'));
        $this->set('user', $this->Auth->user());
    }
   
    
      
}