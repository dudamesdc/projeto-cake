<?php
class UsersController extends AppController
{   
    
    
    public $helpers = array ('Html','Form');
    
    public $uses=['User','Post'];
    
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add_user() {
        if ($this->request->is('post')) {
            $this->User->create();
    
            if ($this->User->save($this->request->data)) {
                
                
    
                $role = $this->request->data('User.role');
                if ($role == 'admin') {
                    $this->Flash->success('Admin cadastrado com sucesso.');
                    $this->redirect(['controller'=>'posts','action' => 'index']);
                }else {
                    $this->Flash->success('Usuário cadastrado com sucesso.');
                    $this->redirect(['controller'=>'posts','action' => 'index']);
                }
            } else {
                $this->Flash->error('Não foi possível cadastrar o usuário.');
            }

        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                if($this->Auth->user('role')=='admin'){
                    $this->Flash->success(__('Usuário salvo.', ['element' => 'success']));
                    $this->redirect(array('action' => 'admin_index'));
                }else{
                    $this->Flash->success(__('Usuário salvo.', ['element' => 'success']));
                    $this->redirect(array('action' => 'user_index'));
                }
            } else {
                if($this->Auth->user('role')=='admin'){
                    $this->Flash->error(__('Não foi possível salvar o usuário.', ['element' => 'success']));
                    $this->redirect(array('action' => 'admin_index'));
                }else{
                    $this->Flash->error(__('Não foi possível salvar o usuário.', ['element' => 'success']));
                    $this->redirect(array('action' => 'user_index'));
                }
            }

        } else {
            
            $id = $this->request->params['pass'][0];
            $user = $this->User->findById($id);
            $this->request->data = $user;
        }
        $this->set('user', $this->Auth->user());
    }
    
    public function delete($id = null) {
        
        $this->User->id = $id;
        $posts=$this->Post->find('all',array('conditions'=>array('Post.user_id'=>$id)));
        foreach ($posts as $post) {
            $this->Post->delete($post['Post']['id']);
        }
        if (!$this->User->exists()) {
            $this->Flash->error(__('Usuário não encontrado', ['element' => 'set']));
            $this->redirect(array('action' => 'admin_index'));
        }
        if ($this->User->delete() ) {
            $this->Flash->success(__('Usuário deletado', ['element' => 'success']));
            $this->redirect(array('action' => 'admin_index'));
        }
        $this->Flash->error(__('Usuário não pode ser deletado', ['element' => 'success']));
        $this->redirect(array('action' => 'admin_index'));
    }
    
    public function login() {
        //"db20acb0545cba58363aabb220f19457767e6024" --> senha 1234
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $role = $this->Auth->user('role');
                if ($role == 'admin') {
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->redirect(array('action' => 'user_index'));
                }
            } else {
                $this->Flash->error(__('Usuário ou senha inválidos, tente novamente',['element' => 'success']));
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
            $this->redirect(['action' => 'user_index']);
        }
        $condi=$this->applyFilter();
        $condi['Post.user_id']=$this->Auth->user('id');
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