<?php
require_once('../app/models/Course.php');
require_once('../app/models/User.php');

class Admincourses extends Controller
{
    function __construct()
    {
        $this->courseModel = new Course();
        $this->userModel = new User();


    }

    public function index()
    {
        $data['courses'] = $this->courseModel->getAllCourses();
        $data['view'] = 'courses/viewAllCourses';
        $this->view('admin/index',$data);


    }

    public function comments()
    {
        $data['comments'] = $this->courseModel->getAllComments();
        $data['view'] = 'comments/viewAllComments';
        $this->view("admin/index",$data);
    }

    public function addCourse()
    {
        $data['instructors'] = $this->userModel->getAllInstructors();
        $data['view'] = 'courses/addCourse';
        $this->view("admin/index",$data);
    }

    public function coursePage($courseId)
    {
        $data['course'] = $this->courseModel->getCourseById($courseId);
        $data['view'] = 'courses/coursePage';
        $data['topics'] = $this->courseModel->getTopicsByCourseId($courseId) ;
        $this->view("admin/index",$data);
    }
   

    public function addTopic($courseId)
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $dbData = [
                'name' => $_POST['topic'],
                'course_id' => $courseId
            ];

            $this->courseModel->addTopic($dbData);
            return header('Location: '. URLROOT. "/admincourses/coursePage/$courseId");

        }else{
            $data['course'] = $this->courseModel->getCourseById($courseId);
            $data['view'] = "courses/addTopicToCourse";
            $this->view('admin/index',$data);
        }
    }

    public function deleteTopic($id,$courseId)
    {
        $this->courseModel->deleteTopicById($id);
        header('Location: '. URLROOT. "/admincourses/coursePage/$courseId");
    }



}// end class.

?>
