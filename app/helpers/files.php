<?php
class Files{

     public function uploadFile($name , $dest){
        if(isset($_FILES[$name])){
            $file = $_FILES[$name];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];

            $fileExt = explode('.',$fileName);
            $fileExt = strtolower(end($fileExt));

            $allowed = ['jpeg','jpg','png','gif'];

            if(!in_array($fileExt,$allowed)){
                return false;
            }
            if($fileError !== 0){
                return false;
            }
            if($fileSize >= 10485760){
                return false;
            }
            $file_new_name = uniqid('',true) .'.'.$fileExt;
            $file_destenation = dirname(APPROOT). "\public\\$dest\\" .$file_new_name;
            if(move_uploaded_file($fileTmp,$file_destenation)){
                return $file_new_name;
            }
            else{
                return false;
            }
        }
    }


    public function validateFile($file){

        $element = 'image';
        if($file === null || $file ===''){
            http_response_code(BAD_REQUEST);
            echo json_encode([
                'msg' =>'file is empty',
                'element' =>$element
                ]);
            return false;
        }

        $fileName = $file['name'];
        $fileTmp = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExt = explode('.',$fileName);
        $fileExt = strtolower(end($fileExt));

        $allowed = ['jpeg','jpg','png','gif'];

        if(!in_array($fileExt,$allowed)){
            http_response_code(BAD_REQUEST);
            echo json_encode([
                'msg' =>'file extension is not valid',
                'element' => $element
            ]);
            return false;
        }
        if($fileSize >= 10485760){
            http_response_code(BAD_REQUEST);
            echo json_encode([
                'msg' =>'file size is to large',
                'element' => $element
                ]);
            return false;
        }
        if($fileError !== 0){
            http_response_code(BAD_REQUEST);
            echo json_encode([
                'msg' =>'error in the file',
                'element' => $element
            ]);
            return false;
        }
        
        
        return true;
    }

}
?>