<?php
class Post extends AppModel {
    public $name = 'Post';

    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public function isOwnedBy($post, $user) {
        return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
    }
    public function add(){
        if (!empty($this->request->data)){
            $this->Post->create();
            if ($this->Post->save($this->request->data)){
                $this->Flash->success(__('The post has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
    }

}

