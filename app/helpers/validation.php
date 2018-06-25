<?php

class InputValue{

    public function __construct($value,$name){
        $this->value = $value;
        $this->name = $name;
        $this->msg = '';
        $this->valid = true;
    }

    public function required(){
        if(!$this->valid) { return $this; }
        if ( $this->value === null || $this->value ===''){
            $this->msg = "$this->name is required";
            $this->valid = false;
        }
        return $this;
    }

    public function minMax($min,$max){
        if(!$this->valid) { return $this; }
        if (!$this->isNumber($this->value) || $this->value < $min || $this->value > $max){
            $this->msg = "$this->name should be between $min to $max";
            $this->valid = false;
        }
        return $this;
    }
    public function length($min,$max){
        if(!$this->valid) { return $this; }
        if (strlen($this->value) < $min || strlen($this->value) > $max){
            $this->msg = "$this->name length should be between $min to $max";
            $this->valid = false;
        }
        return $this;
    }

    public function isNumber(){
        if(!$this->valid) { return $this; }
        if(!is_numeric($this->value)){
            $this->msg = "$this->name should be a number";
            $this->valid = false;
        }
        return $this;
    }

    public function isValid(){
        return $this->valid;
    }

    public function getMsg(){
        return $this->msg;
    }
    public function init(){
        $this->valid = true;
        $this->msg = '';
    }


}// end class



class InputGroup
{

    public function __construct($names,$data)
    {
        $this->msg = '';
        $this->data = [];
        foreach($names as $name){
            $this->data[$name] = new InputValue($data[$name],$name);
        }
    }

    public function isValid(){
        foreach($this->data as $value){ 
            if(!$value->valid){
                $this->msg = $value->msg;
                return false;
            } 
        }
        return true;  
    }
    public function getValues(){
        $data = [];
        foreach($this->data as $key => $value){
            if($value->value !== null){
                $data[$key] = $value->value;
            }
        }
        return $data;
    }
}