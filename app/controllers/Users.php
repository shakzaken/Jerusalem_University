<?php
require_once('../app/helpers/validation.php');

class Users extends Controller
{

    public function __construct()
    {
       $this->userModel = $this->model('User');
       $this->degreeModel = $this->model('AcademicDegree');
    }  

    public function index()
    {
        
       
    }

    public function register()
    {
        $this->view('users/register');
    }

   


    public function login(){
        

        if($_SERVER['REQUEST_METHOD'] == 'POST' )
        {
           
           $names = ['email','password'];
           $inputGroup = new InputGroup($names,$_POST);
           $this->validateLogin($inputGroup);
           $email = $inputGroup->data['email']->value;
           $password = $inputGroup->data['password']->value;

           $userFromDb = $this->userModel->getUserByEmail($email);
           if($userFromDb == null){
                $data['email_err_msg'] = "Email dosn't exists";
                return $this->view('users/login',$data);
                
           }

           if(!password_verify($password,$userFromDb->password)){
                $data['password_err_msg'] = "Password is incorrect";
                return $this->view('users/login',$data);
           }

          
           unset($userFromDb->password);
           $_SESSION['user'] =  $userFromDb;
           header("location: ".URLROOT);  
            
        }
        else{ 

        }
        
        $this->view('users/login');
    }



    private function validateLogin($inputGroup){

        $data = $inputGroup->data;
        $data['email']->required()->length(2,255);
        $data['password']->required()->length(2,255);
        
        if(!$inputGroup->isValid()){
            http_response_code(400);
            echo json_encode([
                'msg' => $inputGroup->msg
            ]);
            return false;
        }
        return true;
    }

    

}//end class
?>