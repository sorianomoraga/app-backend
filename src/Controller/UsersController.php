<?php 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
// Prior to 3.6 use Cake\Network\Exception\NotFoundException
use Cake\Http\Exception\NotFoundException;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','logout','login']);
    }

    public function login()
	{   
        if(!is_null($this->Auth->user('id'))) {
            return $this->redirect($this->Auth->redirectUrl());
        }

	    if ($this->request->is('post')) {
	        $user = $this->Auth->identify();
	        if ($user) {
	            $this->Auth->setUser($user);
	            return $this->redirect($this->Auth->redirectUrl());
	        }
            $this->Flash->error(__('Invalid username or password, try again'));
	        return $this->redirect('/users/login');
	        
	    }
	}

	public function logout()
	{
	    return $this->redirect($this->Auth->logout());
	}

     public function index()
     {
        $this->set('users', $this->Users->find()->all());
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is(['post'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    public function edit($id){
        $user = $this->Users->findById($id)->first();
        
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
        }
        
        $this->set('user',$user);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('El artículo con id: {0} ha sido eliminado.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function password($id){
    	$user = $this->Users->findById($id)->first();

        if ($this->request->is(['post', 'put'])) {
            $data = $this->request->getData();
            if(trim($data['password']) != trim($data['password2'])){
                $this->Flash->error(__('The password is incorrect.'));
            }
            else{
                $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been updated.'));
                    return $this->redirect(['action' => 'index']);
                }
            }
        }
        
        $this->set('user',$user);
    }


}