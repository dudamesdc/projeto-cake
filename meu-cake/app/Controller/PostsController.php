<?php

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    
    public $components =[
        'Paginator','Session'
    ];
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        if($this->Auth->user()){
            $this->Auth->allow(['index', 'view','add','edit','delete','dashboard']);
        }
            
        $this->Auth->allow(['index', 'view','dashboard']);

        

    }
    
    public function index() {
        $this->Paginator->settings = [
            'limit' => 5,
            'order' => ['Post.created' => 'desc'],
            'conditions' => ['Post.is_active' => '1']
        ];
    
        if ($this->request->is('post')) {
            $filtro = $this->request->data['Post'];
            $conditions = ['Post.is_active' => '1']; // Condição padrão
    
            if (!empty($filtro['content'])) {
                $conditions['OR'] = [
                    'Post.body LIKE' => "%{$filtro['content']}%",
                    'Post.title LIKE' => "%{$filtro['content']}%"
                ];
            }
    
            if (!empty($filtro['create'])) {
                $datai = date('Y-m-d', strtotime(implode('-', $filtro['create'])));
                $conditions['Post.created >='] = $datai;
            }
    
            if (!empty($filtro['end'])) {
                $dataf = date('Y-m-d', strtotime(implode('-', $filtro['end'])));
                $conditions['Post.modified <='] = $dataf;
            }
    
            if (isset($filtro['is_active'])) {
                $conditions['Post.is_active'] = ($filtro['is_active'] == '1');
            }
    
            $this->Paginator->settings['conditions'] = $conditions;
        }
    
        $posts = $this->Paginator->paginate('Post');
        $this->set('posts', $posts);
    }
    

    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }

    public function add() {
        
        if ($this->request->is('post' )) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
    
            // Verifica se 'is_active' está definido e é diferente de '0'
            if (isset($this->request->data['Post']['is_active']) && $this->request->data['Post']['is_active'] !== '0') {
                $this->request->data['Post']['status'] = true;
            } else {
                $this->request->data['Post']['status'] = false;
            }
    
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi adicionado.');
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            } else {
                $this->Flash->error('Não foi possível adicionar seu post.');
                $this->redirect(['controller' => 'Users', 'action' => 'user_index']);
            }
        }
    
        
    }
    
    function delete($id) {
        
        if ($this->request->is('post')) {
            throw new MethodNotAllowedException();
        }else{
            
            if ($this->Post->delete($id)) {
                $this->Flash->success('The post with id: ' . $id . ' has been deleted.');
                $this->redirect(['controller'=>'Users','action' => 'user_index']);
            }$this->Flash->error('The post with id: ' . $id . ' could not be deleted.');
            $this->redirect(['controller'=>'Users','action' => 'user_index']);
        }
    }   
    function edit(){
       
        if (($this->request->is('post')||($this->request->is('put')))) {
            $id=$this->request->data['Post']['id'];
            $post=$this->Post->findById($id);
            
            if($this->Post->save($this->request->data)){
                $this->Flash->success(__('Seu post foi atualizado.'));
                return $this->redirect(array('controller'=>'Users','action'=>'user_index'));
            }
            $this->Flash->error(__('Não foi possível atualizar seu post.'));
            
        }else{
            $id=$this->request->params['pass'][0];
            $post=$this->Post->findById($id);
            $this->request->data=$post ;
        }   

     
    }
    function deleteUser($id){
        if($this->request->is('post')){
            if ($this->Post->delete($id)) {
                $this->Flash->success('The post with id: ' . $id . ' has been deleted.');
                $this->redirect(array('controller'=>'users','action' => 'index'));
            }$this->Flash->error('The post with id: ' . $id . ' could not be deleted.');
        }
    } 
    
    public function logout(){
        return $this->redirect($this->Auth->logout());
        
    }
    
}