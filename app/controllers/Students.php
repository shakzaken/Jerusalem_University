<?php

    class Students extends Controller
    {
      public function __construct()
      {
         $this->degreeModel = $this->model('AcademicDegree');
         $this->studentModel = $this->model('Student');
         $this->userModel = $this->model('User');
      }


      public function index()
      {

      }

      public function myCourses()
      {
          $user = $_SESSION['user'];
          $courses = $this->studentModel->getAllCourses($user->id);
          $allDegrees = $this->degreeModel->getAllDegrees();

          $data['degree'] = $this->degreeModel->getDegreeById($user->degree_id);
          $data['user'] = $user;
          $data['courses'] = $courses;
          $data['allDegrees'] = $allDegrees;
          $this->view('students/myCourses',$data);
      }


      public function register($degreeId)
      {
        try{
          $this->studentModel->register($degreeId);
          $userId =  $_SESSION['user']->id;
          $_SESSION['user'] = $this->userModel->getUserById($userId);
        header('location: '. URLROOT ."/students/myCourses");
        }catch(PDOException $ex){
          echo $ex->getMessage();
        }
        
      }


    }

?>
