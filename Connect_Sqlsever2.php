<?php
class Connect_Sqlsever{
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
       // $connect = array( "UID" => "sa", "PWD" => "dx5cNeH^6A", "Database" => "Employee_AKP" );
        $connect = array( "UID" => "username", "PWD" => "password","Database" => $this->database,"CharacterSet"=>"UTF-8");
        $this->conn = sqlsrv_connect("ip",$connect)or die("error connect database: ".$this->database);
        
    }
    public function queryData()
    {
      $this->query = sqlsrv_query($this->conn,$this->sql)or die("error query: ".$this->database);
    }
    public function fetch_ArrayData()
    {
      return sqlsrv_fetch_array($this->query);
    }
    public function num_rows()
    {
      return sqlsrv_num_rows($this->query);
    }
    public function closeConnect()
    {
        sqlsrv_close($this->conn);
    }
    
}
?>
