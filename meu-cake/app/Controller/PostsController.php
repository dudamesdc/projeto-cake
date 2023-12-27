<?php

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    public $uses = array('User');
    
    public $components =[
        'Paginator','Session','RequestHandler'

        
    ];
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('delete');
        
    }
    
    
    
    

    public function view_profile( $id) {
        
        $this->loadModel('User');
        
        if ($this->request->is('post')) {
                
                
            $filtro = $this->request->data;
            
            $this->Session->write('filter', $filtro);
            

    
        }
        if ($this->request->query('reset')) {
            $this->Session->delete('filter');
            $this->redirect(['action' => 'user_index']);
        }
        $condi=$this->applyFilter();
        $condi['Post.user_id'] = $id;
        $this->Paginator->settings = [
            'limit' => 5,
            'order' => ['Post.created' => 'desc'],
            'conditions' => $condi
        ];
        
        $this->set('posts', $this->Paginator->paginate('Post'));
        $this->set('user', $this->User->findById($id));
        
    }
    

    public function add_post() {
        
        if ($this->request->is('post' )) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
    
            
            
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi adicionado.', ['element' => 'success']);
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            } else {
                $this->Flash->error('Não foi possível adicionar seu post.', ['element' => 'success']);
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            }
        }
        $this->set('post', $this->Post->create());


    }
    
    function delete_post($id) {
        $this->loadModel('Post');
        if (!$this->request->is('post')) {
            $id=$this->Post->id;
            if ($this->Post->delete($id)) {
                $this->Flash->success('post deletado com sucesso.');
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            } else {
                $this->Flash->error('Não foi possível deletar o post.');
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            }
        } else {
            $this->Flash->error('Não foi possível deletar o post.', ['element' => 'success']);
            $this->redirect(['controller' => 'Users', 'action' => 'index']);
        }
    }
    function edit() {
        if (($this->request->is('post') )) {
            $id = $this->request->data['Post']['id'];
            $post = $this->Post->findById($id);
    
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Seu post foi atualizado.'), ['element' => 'success']);
                return $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            }
            $this->Flash->error(__('Não foi possível atualizar seu post.'), ['element' => 'success']);
        } else {
            $id = $this->request->params['pass'][0];
            $post = $this->Post->findById($id);
            $this->request->data = $post;
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
                    $dataf = date('Y-m-d', strtotime(implode('-', $filtro['Post']['end'])));
                    $conditions['Post.modified <='] = $dataf;
                }
            
               
            
               if(isset ($filtro['Post']['is_active'])&& $filtro['Post']['is_active'] != null) {
                   if($filtro['Post']['is_active'] == true){
                       $conditions['Post.is_active'] = true;
                   }else{
                          $conditions['Post.is_active'] = false;
                   }
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
            $this->loadModel('User');
            $this->set('user', $this->Auth->user());
            
    }
    public function view_post($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }
    
}

