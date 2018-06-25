

<?php




class User
{
    private $db;
    private $dbf;
   
    
    public function __construct()
    {
        $this->db = new Database();
        $this->dbf = new DbFunctions();
        
    }

    public function findEmail($email)
    {
       return $user = $this->dbf->getRowByVal($email,'email','users');
    }

    public function register($data)
    {
         $this->dbf->insertRow($data,'users');  
    }
    public function addUser($data)
    {
         $this->dbf->insertRow($data,'users');  
    }

    public function getUserByEmail($email)
    {
       return  $this->dbf->getRowByVal($email,'email','users');  
    } 
    public function getAllInstructors(){
        $val = 'instructor';
        return $this->dbf->getRowsByVal($val,'role','users');
    }
    
    public function getAllUsers()
    {
        return $this->dbf->getAllRows('users');
    }
    public function getUserById($id)
    {
       return  $this->dbf->getRowByVal($id,'id','users');  
    } 
    public function deleteUserById($id)
    {
        $this->dbf->deleteRowByVal($id,'id','users');
    }

    public function updateUser($id,$user)
    {
        $this->dbf->updateRowByVal($user,'users',$id,'id');
    }
}

