<?php

class Degrees extends Controller
{

    public function __construct()
    {
        $this->degreeModel = $this->model('AcademicDegree');
        $this->courseModel = $this->model('Course');
        $allDegrees = $this->degreeModel->getAllDegrees();
        $data['allDegrees'] = $allDegrees;
    }

   
    
    public function index($id)
    {
        
        $data['id'] =$id;       
        $degree = $this->degreeModel->getDegreeById($id);
        $courses =  $this->degreeModel->getCourseByDegreeId($id);
        //shuffle($courses);
        $data['courses'] = $courses;
        $degree_calculation = $this->calculatePoints($courses);
        $data['degreePoints'] = $degree_calculation['points'];
        $data['coursesCount'] = $degree_calculation['coursesCount'] ;
        $data['degree'] = $degree;    
        
         
        $this->view("degrees/degreePage", $data);

    }


    


    public function showCourse($id)
    {
        $allDegrees = $this->degreeModel->getAllDegrees();
        $data['allDegrees'] = $allDegrees;
        $course = $this->courseModel->getCourseById($id);
        $data['course'] = $course;
        $showRegistration = $this->showRegistration($id);
        $data['showRegistration'] = $showRegistration;
        $this->view("degrees/showCourse",$data);
    }
    
    public function courseRegistration($courseId,$studentId)
    {
        if($this->showRegistration($courseId))
        {
            $this->degreeModel->registerStudentToCourse($courseId,$studentId);
        }
        Header('Location: '.URLROOT.'/degrees/showCourse/' . $courseId);
    }


    private function calculatePoints($courses){
        $sum = 0;
        $counter = 0;
        foreach($courses as $course){
            $sum += $course->points;
            $counter +=1;
        }
        return [
            'points' => $sum,
            'coursesCount' => $counter
        ];
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