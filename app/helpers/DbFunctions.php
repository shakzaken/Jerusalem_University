<?php 

class DbFunctions
{
    private $db;
    function __construct()
    {
        $this->db = new Database();
    }

    public function insertRow($data,$table,$type = null)
    {
        
        $sql = "INSERT INTO $table(";
        foreach($data as $key =>$val)
        {
            $sql.= $key .",";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= ") VALUES(";
        foreach($data as $key =>$val)
        {
            $sql.=":". $key .",";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .=")";
        
        $this->db->query($sql);
        foreach($data as $key =>$val)
        {
            $this->db->bind(':'.$key,$val);
        }
        $this->db->execute();
    }

    function getRowByVal($val,$col,$table)
    {
        $sql = "SELECT * FROM $table WHERE $col = :$col";
        $this->db->query($sql);
        $this->db->bind(':'.$col,$val);
        $this->db->execute();
        
        if($this->db->rowCount() > 0)
        {
            return $this->db->single();
        }
        else{
            return null;
        }  
    }

    function getRowsByVal($val,$col,$table)
    {
        $sql = "SELECT * FROM $table WHERE $col = :$col";
        $this->db->query($sql);
        $this->db->bind(':'.$col,$val);
        $this->db->execute();
        
        if($this->db->rowCount() > 0)
        {
            return $this->db->resultSet();
        }
        else{
            return [];
        }  
    }

    function getAllRows($table)
    {
        $sql = "select * from $table";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->resultSet();
    }

    function deleteRowByVal($val,$col,$table)
    {
        $sql = "DELETE FROM $table WHERE $col = :$col";
        $this->db->query($sql);
        $this->db->bind(':'.$col,$val);
        $this->db->execute();

    }

    function updateRowByVal($row,$table,$value,$valName)
    {
        
        $sql ="UPDATE $table SET ";
        foreach($row as $col =>$val)
        {
            $sql .="$col = :$col,";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .=" WHERE $valName = $value";
        $this->db->query($sql);
        foreach($row as $col => $val)
        {
            $this->db->bind(":$col",$val);
        }
        $this->db->execute();
    }


   


}