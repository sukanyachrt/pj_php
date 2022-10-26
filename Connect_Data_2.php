<?php
class Connect_Data{
    public $database = '';
    public $conn = '';
    public $sql = '';
    public $query = '';
    public $row = '';
    
    public function __construct($db)
    {
        $this->database = $db;
    }

    public function connectData()
    {
        //$this->conn = mysqli_connect("210.1.60.114","intranet_apk","@apk2015",$this->database)or die("error connect database: ".$this->database);
       // $this->conn = mysqli_connect("localhost","root","",$this->database)or die("error connect database: ".$this->database);
       $this->conn = mysqli_connect("localhost","root","",$this->database)or die("error connect database: ".$this->database); 
       mysqli_set_charset($this->conn,'utf8');
    }

    public function queryData()
    {
      $this->query = mysqli_query($this->conn,$this->sql)or die("error query: ".$this->database);
    }

    public function fetch_ArrayData()
    {
      return mysqli_fetch_array($this->query);
    }

    public function num_rows()
    {
      return mysqli_num_rows($this->query);
    }
    public function affected_rows()
    {
      return mysqli_affected_rows($this->conn);
    }
    
    public function closeConnect()
    {
      mysqli_close($this->conn);
    }
}
?>
