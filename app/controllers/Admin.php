<?php

class Admin extends Controller
{
     
    function __construct()
    {
      
    }

    public function index()
    {   
        $data = [];
        return $this->view('admin/index',$data);    
    }

    

}

?>