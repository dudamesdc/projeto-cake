<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A username is required'
            ),
            
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A email is required'
                
            )
        ),
        'cpf' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A cpf is required'
            )
        )
    );
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
    
    public $hasMany=array(
        'Post'=>array(
            'className'=>'Post',
            'foreignKey'=>'user_id'
        )
    );
    

}