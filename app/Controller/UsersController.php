<?php
class UsersController extends AppController
{
    public $components = array('RequestHandler');

    public function index() {
        $data = $this->User->find('all');
        $this->set(array(
            'users' => $data,
            '_serialize' => array('users')
        ));
    }

    public function view($id) {
        $data = $this->User->findById($id);
        $this->set(array(
            'users' => $data,
            '_serialize' => array('users')
        ));
    }

	public function add() {
		
        if ($this->User->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
    
    public function edit($id) {
        $this->User->id = $id;
        if ($this->User->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->User->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
    public function login()
    {
        $userLogin = $this->User->login($this->request->data["user_email"], $this->request->data["user_pwd"]);
        if( $userLogin )
        {
            $userLogin[0]["users"]["profile"] = "../images/profile/".$userLogin[0]["users"]["profile"];
            $userLogin[0]["users"]["status"] = "success";
        }
        else
        {
            //$data = array("status"=>"error", "message"=>"Incorrect user name or password!");
            $userLogin[0]["users"]["status"] = "error";
            $userLogin[0]["users"]["message"] = "Incorrect user name or password!";
        }
        $data = $userLogin;

        $this->set(array(
            'users' => $data,
            '_serialize' => array('users')
        ));
    }
}
?>