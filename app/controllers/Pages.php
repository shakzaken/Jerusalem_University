
<?php

    class Pages extends Controller
    {
      public function __construct()
      {
         $this->degreeModel = $this->model('AcademicDegree');
         
      }  


      public function index()
      {
          $allDegrees = $this->degreeModel->getAllDegrees();
          foreach($allDegrees as $degree){
              $str = '';
              $arr = explode(' ',$degree->description);
              for($i = 0 ; $i< 10 ;$i++){
                $str = $str . $arr[$i] .' ';
              }
              $degree->des = $str . '...';

          }
          $data =[
              'title' =>'TraversyMVC' ,
              'allDegrees' => $allDegrees , 
          ];
        $this->view('pages/index',$data);      
      }

      public function about()
      {
        $data =[
            'title' =>'About us'
        ];
          $this->view('pages/about',$data);
      }

    }

?>