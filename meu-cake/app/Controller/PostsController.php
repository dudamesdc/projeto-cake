<?php

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Posts';

    
    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow(['index', 'view']);

        

    }
    
    function index() {
        $conditions = [];
        
        if ($this->request->is('post')) {
            $post = $this->request->data('Post');
        if (!empty($post['content'])) {
            $conditions['OR'] = [
            'Post.body LIKE' => "%{$post['content']}%",
            'Post.title LIKE' => "%{$post['content']}%"
        ];
        }
        if (!empty($post['create'])) {
            $datai = date('Y-m-d', strtotime(implode('-', $post['create'])));
            $conditions['Post.created >='] = $datai;
        }
        
        if (is_array($post) && !empty($post['end'])) {
            $dataf = date('Y-m-d', strtotime(implode('-', $post['end'])));
            $conditions['Post.modified <='] = $dataf;
        }
        

        $posts = $this->Post->find('all', ['conditions' => $conditions]);
        $this->set('posts', $posts);
        }
        $posts=$this->Post->find('all',array('countain'=>'User'));
        $this->set('posts', $posts);
        

    }

    public function view($id = null) {
        $this->set('post', $this->Post->findById($id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id'); // Adicionada essa linha
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Seu post foi adicionado.');
                $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error('Não foi possível adicionar seu post.');
            $this->redirect(array('action' => 'index'));
        }
       
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
}