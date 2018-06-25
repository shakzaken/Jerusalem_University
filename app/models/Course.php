<?php
class Course
{
   
    private $db;
    private $dbf;
    
    public function __construct()
    {
        $this->db = new Database();
        $this->dbf = new DbFunctions();
    }

    
    public function addComment($data){
        $this->dbf->insertRow($data,'comments');
    }

    public function addCourse($data)
    {
         $this->dbf->insertRow($data,'courses');  
    }
    public function addTopic($data)
    {
         $this->dbf->insertRow($data,'topics');  
    }

   
    public function getAllCourses()
    {
        return $this->dbf->getAllRows('courses');
    }
    public function getAllTopics()
    {
        return $this->dbf->getAllRows('topics');
    }

    public function getCourseById($id)
    {
       return  $this->dbf->getRowByVal($id,'id','courses');  
    } 
    public function deleteCourseById($id)
    {
        $this->dbf->deleteRowByVal($id,'id','courses');
        $this->dbf->deleteRowByVal($id,'course_id','degrees_courses');
    }

    public function deleteTopicById($id)
    {
        $this->dbf->deleteRowByVal($id,'id','topics');
    }

    public function getTopicsByCourseId($id)
    {
       return  $this->dbf->getRowsByVal($id,'course_id','topics');  
    } 

    

    public function insertImage($data){

        $sql = "insert into files(name,body)  values(:name,:body)";
        $this->db->query($sql);
        $this->db->bind('name',$data['name']);
        $this->db->bind('body',$data['body'],'file');
        $this->db->execute();

    }

    public function getImageById($id){ 
        return $this->dbf->getRowByVal($id,'id','files'); //**/*/* */
    }


    public function getCourseComments($id){
        $sql = 'select * from comments, users where course_id = :course_id and user_id = users.id' ;
        $this->db->query($sql);
        $this->db->bind('course_id',$id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getAllComments(){
        $sql = "SELECT comment_id, first_name,last_name,name as course_name,body,date";
        $sql .=" from courses,users,comments "; 
        $sql .=" where courses.id = comments.course_id ";
        $sql .=" and comments.user_id = users.id";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getCommentById($id){
        return $this->dbf->getRowByVal($id,'comment_id','comments');
    }

    public function deleteCommentById($id)
    {
        $this->dbf->deleteRowByVal($id,'comment_id','comments');
    }


    

}
?>