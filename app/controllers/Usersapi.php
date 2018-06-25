<?php 

require_once('../app/helpers/validation.php');
require_once('../app/helpers/files.php');

class Usersapi extends Controller
{

    public function __construct()
    {
        $this->degreeModel = $this->model('AcademicDegree');
        $this->courseModel = $this->model('Course');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        
    }

    public function addUser()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' )
        {  

            $names = ['first_name','last_name','email','role','password','confirm_password'];
            if(!$this->isSet($names,$_POST)) { return; }
            $inputGroup = new InputGroup($names,$_POST);
            if(!$this->validateData($inputGroup)) { return; }
            if(!$this->checkEmail($inputGroup->data['email']->value)) { return; }
            if(!$this->checkPasswords($inputGroup->data)) { return ;}

            $files = new Files();
            if(count($_FILES) < 1){
                http_response_code(BAD_REQUEST);
                echo json_encode(['msg' =>'file is empty']);
                return ;
            }
            $file = $_FILES['image'];
            if(!$files->validateFile($file)) { return; }

            $data = $inputGroup->getValues();
            $data['image'] = file_get_contents($file['tmp_name']) ;
    

            $this->userModel->addUser($data);
            
            echo json_encode(['msg'=> 'user added succesfuly']);
        }
    }

    


    public function delete($id){

        if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
            $this->userModel->deleteUserById($id);
            echo json_encode([
                'msg' => 'user deleted successfuly',
                'element' => 'general'
            ]);
            return;
        }
        
        http_response_code(NOT_FOUND);
        echo json_encode([
            'msg' => 'error deleting user',
            'element' => 'general'
        ]);

    }

    private function isSet($names,$data){
        foreach($names as $name){
            if( !isset($data[$name])){
                http_response_code(BAD_REQUEST);
                echo json_encode([
                    'msg' => "$name is not set",
                    'element' => "$name"
                ]);
                return false;
            }
        }
        return true;
    }

    

    private function validateData($inputGroup){
        
        $data = $inputGroup->data;

        $data['first_name']->required()->length(2,255);
        $data['last_name']->required()->length(2,255);
        $data['email']->required()->length(2,255);
        $data['role']->required()->length(2,255);
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

    private function checkEmail($email){
        $emailFromDb = $this->userModel->getUserByEmail($email);
        if($emailFromDb !== null){
            http_response_code(400);
            echo json_encode([
                'msg' => 'Email already exists',
                'element' => 'email'
            ]);
            return false; 
        }
        return true;
    }

    public function checkPasswords($data){
        if($data['password']->value!== $data['confirm_password']->value){
            http_response_code(400);
            echo json_encode([
                'msg' => 'Passwords do not match',
                'element' => 'password'
            ]);
            return false;
        }
        $data['confirm_password']->value = null;
        $data['password']->value = password_hash($data['password']->value,PASSWORD_DEFAULT);
        return true;
    }

}
?>