<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Flash',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home')
        ),
        'Session','RequestHandler', 'Paginator'

    );
    
    public $helpers = array('Js' => array('Jquery'));

    public function beforeFilter() {
        $this->Auth->allow(['index', 'view_post', 'add', 'login', 'view_profile', 'logout']);
        if ($this->Auth->user('role') === 'admin') {
            $this->Auth->allow(['edit_post', 'delete_post', 'user_index', 'admin_index','edit', 'delete']);
        } elseif ($this->Auth->user('role') === 'author') {
            $this->Auth->allow(['user_index', 'edit', 'delete_post', 'edit_post']);
        }
    }
    
    public function isAuthorized($user) {
        return true; 
    
        
        if ($user['role'] === 'admin') {
            return true; 
    
        
        $controller = $this->request->params['controller'];
        $action = $this->request->params['action'];
    
        if ($action === 'user_index' && $user['role'] === 'author') {
            return true; 
        }
    
        return false; 
    }
    


    }

}   
    
    



