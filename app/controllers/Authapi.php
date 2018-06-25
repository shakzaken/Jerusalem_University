<?php 
require_once('../app/helpers/validation.php');
require_once('../app/helpers/files.php');

class Authapi extends Controller
{

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        
    }

    public function isLogin(){
        if($_SESSION['user'] !== null){
            return true;
        }
        return false;
    }

    public function logout(){
        $_SESSION['user'] = null;
        header('location: ' . URLROOT);
    }
}