<?php
class Post extends AppModel {
    public $name = 'Post';
    public $belongsTo = array('User'=>array(
        'className' => 'User',
        'foreignKey' => 'user_id'
    ));

    public $validate = array(
        'title' => array(
            'rule' => 'notBlank'
        ),
        'body' => array(
            'rule' => 'notBlank'
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
                $this->redirect(array('url' => 'index'));
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
    }

}

