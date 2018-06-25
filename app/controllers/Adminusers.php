<?php
require_once('../app/models/User.php');
require_once('../app/helpers/files.php');

class Adminusers extends Controller
{
    

    function __construct()
    {
        $this->userModel = new User();  
        $this->files = new Files(); 
    }

    public function index()
    {    
        $users = $this->userModel->getAllUsers();
        $data['allUsers'] = $users;
        $data['view'] = 'users/viewAllUsers'; 
        $this->view('admin/index',$data);
  
    }

    public function addUser()
    {
        $data['view'] = 'users/addUser'; 
        $this->view('admin/index',$data);
    }
 
}

?>