<?php 
require_once('../app/helpers/validation.php');
require_once('../app/helpers/files.php');

class Coursesapi extends Controller
{

    public function __construct()
    {
        $this->degreeModel = $this->model('AcademicDegree');
        $this->courseModel = $this->model('Course');
    }

    public function index()
    {
        
    }

    public function addCourse()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' )
        {  

            $names = ['name','points','field','description','instructor','instructorId'];
            $inputGroup = new InputGroup($names,$_POST);
            if(!$this->validateData($inputGroup)) { return; }

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

            $this->courseModel->addCourse($data);

            echo json_encode(['msg'=> 'course added succesfuly']);
        }
    }

    public function delete($id){

        if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
            $this->courseModel->deleteCourseById($id);
            echo json_encode([
                'msg' => 'course deleted successfuly',
                'element' => 'general'
            ]);
            return;
        }
        
        http_response_code(NOT_FOUND);
        echo json_encode([
            'msg' => 'error deleting course',
            'element' => 'general'
        ]);

    }


    private function validateData($inputGroup){

        $data = $inputGroup->data;
        $data['name']->required()->length(2,255);
        $data['points']->required()->minMax(1,100);
        $data['field']->required()->length(2,255);
        $data['description']->required()->length(2,1024);
        $data['instructor']->required()->length(2,255);
        $data['instructorId']->required();
        
        if(!$inputGroup->isValid()){
            http_response_code(400);
            echo json_encode([
                'msg' => $inputGroup->msg
            ]);
            return false;
        }

        return true;

    }

}
?>