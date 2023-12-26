<?php

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    
    public $components =[
        'Paginator','Session','RequestHandler'

        
    ];
    
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        if($this->Auth->user()){
            $this->Auth->allow(['index', 'view','add','edit','delete','dashboard']);
        }
            
        $this->Auth->allow(['index', 'view','add','login']);

        

    }
    
    
    

    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
        
    }

    public function add() {
        
        if ($this->request->is('post' )) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
    
            
            if (isset($this->request->data['Post']['is_active']) && $this->request->data['Post']['is_active'] !== '0') {
                $this->request->data['Post']['status'] = true;
            } else {
                $this->request->data['Post']['status'] = false;
            }
    
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi adicionado.', ['class' => 'alert alert-success']);
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            } else {
                $this->Flash->error('Não foi possível adicionar seu post.', ['class' => 'alert alert-danger']);
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            }
        }
        
        
    }
    
    function delete($id) {
        if (!$this->request->is('post')) {
            if ($this->Post->delete($id)) {
                if ($this->Auth->user('role') == 'user') {
                    $this->Flash->success('The post with id: ' . $id . ' has been deleted.', ['class' => 'alert alert-success']);
                    $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
                } else {
                    $this->Flash->success('The post with id: ' . $id . ' has been deleted.', ['class' => 'alert alert-success']);
                    $this->redirect(['controller' => 'Users', 'action' => 'admin_index']);
                }
            } else {
                $this->Flash->error('The post with id: ' . $id . ' could not be deleted.', ['class' => 'alert alert-danger']);
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            }
        } else {
            $this->Flash->error('The post with id: ' . $id . ' could not be deleted.', ['class' => 'alert alert-danger']);
            $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
    }
    function edit() {
        if (($this->request->is('post') || ($this->request->is('put')))) {
            $id = $this->request->data['Post']['id'];
            $post = $this->Post->findById($id);
    
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Seu post foi atualizado.'), ['class' => 'alert alert-success']);
                return $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            }
            $this->Flash->error(__('Não foi possível atualizar seu post.'), ['class' => 'alert alert-danger']);
        } else {
            $id = $this->request->params['pass'][0];
            $post = $this->Post->findById($id);
            $this->request->data = $post;
        }
    }
    
    function deleteUser($id) {
        if ($this->request->is('post')) {
            if ($this->Post->delete($id)) {
                $this->Flash->success('The post with id: ' . $id . ' has been deleted.', ['class' => 'alert alert-success']);
                $this->redirect(['controller' => 'users', 'action' => 'index']);
            }
            $this->Flash->error('The post with id: ' . $id . ' could not be deleted.', ['class' => 'alert alert-danger']);
        }
    }
    
    public function logout(){
        return $this->redirect($this->Auth->logout());
        
    }
    
    private function applyFilter(){
           $conditions = array();

           if($this->Session->check('filter')){
               $filtro = $this->Session->read('filter');
               $this->request->data['Post'] = $filtro['Post'];
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
        
        public function index() {
            
            
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
            
            $this->set('posts', $this->Paginator->paginate('Post'));
    
    }
    
}