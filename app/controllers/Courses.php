<?php

class Courses extends Controller
{

    public function __construct()
    {
        $this->degreeModel = $this->model('AcademicDegree');
        $this->courseModel = $this->model('Course');
    }


    public function index($id)
    {
        
        $course = $this->courseModel->getCourseById($id);
        $data['course'] = $course;
        $showRegistration = $this->showRegistration($id);
        $data['showRegistration'] = $showRegistration;
        $data['comments'] = $this->courseModel->getCourseComments($id);
        $data['topics'] = $this->courseModel->getTopicsByCourseId($id);
        $this->view("courses/showCourse",$data);

    }

   

    public function deleteComment($id){
        $comment = $this->courseModel->getCommentById($id);
        $course_id = $comment->course_id;
        if($_SESSION['user']->id === $comment->user_id){
            $this->courseModel->deleteCommentById($id);
             header('location: '. URLROOT ."/courses/$course_id");
            
        }

    }

    public function addComment($courseId){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           
            
            if(!isset($_SESSION['user'])){
                
                return Header('location: ' .URLROOT ."/courses/$courseId");
            }
            
            $serverData = [
                'course_id' => $courseId,
                'user_id' => $_SESSION['user']->id,
                'body' => $_POST['body']
                
            ];

            $this->courseModel->addComment($serverData);
            Header('location: ' .URLROOT ."/courses/$courseId");
        }
    }

    
    public function courseRegistration($courseId,$studentId)
    {
        if($this->showRegistration($courseId))
        {
            $this->degreeModel->registerStudentToCourse($courseId,$studentId);
        }
        Header('Location: '.URLROOT.'/degrees/showCourse/' . $courseId);
    }


    

    private function showRegistration($courseId)
    {
        if(!isset($_SESSION['user']))
        {
            return false;
        }
        $studentId = $_SESSION['user']->id;

       $hasCourse= $this->degreeModel->checkCourseStudent($courseId,$studentId);
       return !$hasCourse;
    }

}
?>