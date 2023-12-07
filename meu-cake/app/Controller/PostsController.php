<?php

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Posts';
    
    
    public function beforeFilter() {
        parent::beforeFilter();
        if($this->Auth->user()){
            $this->Auth->allow(['index', 'view','add','edit','delete','dashboard','filter']);
        }
            
        $this->Auth->allow(['index', 'view','dashboard']);

        

    }
    
    function index() {
        
        $posts=$this->Post->find('all',array('countain'=>'User'));
        $this->set('posts', $posts);
        

    }

    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }

    public function add() {
        
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id']=$this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi adicionado.');
                $this->redirect(array('controller'=>'Users','action' => 'user_index'));
            $this->Flash->error('Não foi possível adicionar seu post.');
            $this->redirect(array('controller'=>'Users','action' => 'user_index'));
            }
        
        }
        $this->Flash->error('Não foi possível adicionar seu post.');
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
       
        if ($this->request->is('put', 'post')) {
            $id=$this->request->data['Post']['id'];
            $post=$this->Post->findById($id);
            
            if($this->Post->save($this->request->data)){
                $this->Flash->success(__('Seu post foi atualizado.'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Flash->error(__('Não foi possível atualizar seu post.'));
            
        }else{
            $id=$this->request->params['pass'][0];
            $post=$this->Post->findById($id);
            $this->request->data=$post;
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
    public function filter (){
        $conditions = [];
        
        if ($this->request->is('post')) {
            
            $this->request->getSession()->write('Filter', $filtro);
        }
        $Filter=$this->request->getSession()->read('Filter');    
        if($filter){
            if (!empty($Filter['content'])) {
            $conditions['OR'] = [
            'Post.body LIKE' => "%{$Filter['content']}%",
            'Post.title LIKE' => "%{$Filter['content']}%"
            ];
            }
            if (!empty($Filter['create'])) {
            $datai = date('Y-m-d', strtotime(implode('-', $Filter['create'])));
            $conditions['Post.created >='] = $datai;
            }
        
            if (!empty($Filter['end'])) {
            $dataf = date('Y-m-d', strtotime(implode('-', $Filter['end'])));
            $conditions['Post.modified <='] = $dataf;
            }
            if(!empty($Filter['status'])){
                $conditions['Post.status'] = $Filter['status'];
            }
        }

        
    }
    public function dashboard(){
        $this->set('posts', $this->Post->find('all', array('contain'=>array('User'))));
        
    }
    
}