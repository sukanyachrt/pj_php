<?php
class Connect_Sqlsever{
    public $database = '';
    public $conn = '';
    public $sql = '';
    public $query = '';
    public $row = '';
    public $serverName = '';
    public $connectionInfo = '';
    public $params = array();
    public $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );

    public function __construct($db)
    {
        $this->database = $db;
    }

    public function connectData()
    {
        $this->serverName = "ip";
        $this->connectionInfo = array( "Database"=>$this->database, "UID"=>"username", "PWD"=>"password","CharacterSet"  => 'UTF-8');
        $this->conn = sqlsrv_connect( $this->serverName, $this->connectionInfo);
    }
    public function queryData()
    {
        //ไว้เรียสำหรับ query ข้อมูล
     return $this->query = sqlsrv_query($this->conn,$this->sql)or die("error query: ".$this->database);
    }
    public function query()
    {
        //ไว้เรียกสำหรับนับแถวต่อไป
        return $this->query = sqlsrv_query($this->conn,$this->sql,$this->params,$this->options)or die("error query: ".$this->database);
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
