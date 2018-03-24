class User
{
private $username;
private $tablename;
private $conn;

function __construct($con)
{
$this->conn = $con;
}

function getTableName()
{
return $this->tablename;

}

function getUserName()
{
return $this->username;

}
}


