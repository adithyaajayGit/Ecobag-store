<?php
class dboperation
{
    public $conn,$res;
    function __construct()
    {
        $this->conn=mysqli_connect("localhost:3306","root","","db_ecobag");
        if(!$this->conn)
        {
            die("Connection failed".mysqli_connect_error());
        }
    }
    public function executequery($sql)
    {
        $this->res=mysqli_query($this->conn,$sql);
        return $this->res;
    }
}
?>