<?php 
require_once('../app/helpers/validation.php');
require_once('../app/helpers/files.php');

class Degreesapi extends Controller
{

    public function __construct()
    {
        $this->degreeModel = $this->model('AcademicDegree');
        $this->courseModel = $this->model('Course');
    }

    public function index()
    {
        
    }

    public function addDegree()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' )
        {  

            $names = ['name','points','full_name','description'];
            $inputGroup = new InputGroup($names,$_POST);
            if(!$this->validateData($inputGroup)) { return; }

            if(!$this->validateImages($_FILES)) {
                echo 'not valid453';
                 return; 
                }
  

            $data = $inputGroup->getValues();
            $data['image1'] = file_get_contents($_FILES['image1']['tmp_name']) ;
            $data['image2'] = file_get_contents($_FILES['image2']['tmp_name']) ;
            $data['image3'] = file_get_contents($_FILES['image3']['tmp_name']) ;

            $this->degreeModel->addDegree($data);
            
            echo json_encode(['msg'=> 'degree added succesfuly']);
        }
    }



    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] === 'DELETE'){
            $this->degreeModel->deleteDegreeById($id);
            echo json_encode([
                'msg' => 'degree deleted successfuly',
                'element' => 'general'
            ]);
            return;
        }
        
        http_response_code(NOT_FOUND);
        echo json_encode([
            'msg' => 'error deleting degree',
            'element' => 'general'
        ]);
    }

    private function validateImages($files){
        $filesChecker = new Files();
        if(count($files) < 3){
            http_response_code(BAD_REQUEST);
            echo json_encode(['msg' =>'all images are required']);
            return  false;
        }
        foreach($files as $file){
            if(!$filesChecker->validateFile($file)) { return; }
        }
        return true;
    }


    private function validateData($inputGroup){

        $data = $inputGroup->data;
        $data['name']->required()->length(2,255);
        $data['points']->required()->minMax(1,300);
        $data['full_name']->required()->length(2,255);
        $data['description']->required()->length(2,1024);
        
        
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