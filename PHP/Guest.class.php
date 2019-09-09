<?php

class Guest {

	protected $host;
	protected $username;
	protected $password;
	protected $dbname;
    protected static $conn=false;

    public function __construct( $host="", $username="", $password="", $dbname=""  ) {
        $this->setHost($host);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setDbname($dbname);
        $this->connectDbServer();
	}
    
    public function __call($name, $arguments)
    {
        $propertyName=strtolower(substr($name, 3,strlen($name)));       
        if(property_exists ($this,$propertyName)){
            if(substr($name, 0,3)=="set"){ //Setter
                $this->$propertyName=$arguments[0];
            }else if(substr($name, 0,3)=="get"){ //Getter
                return $this->$propertyName;
            }
        }else{
            throw new Exception("Invalid member function called : ".$name." ");
        }
    }
    
    protected function connectDbServer(){
        if(!self::$conn){
            $conn = mysqli_connect($this->getHost(), $this->getUsername(), $this->getPassword(), $this->getDbname());
            if (!$conn) {
                $msg= "Error: Unable to connect to MySQL." . PHP_EOL;
                $msg.= "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                $msg.= "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                throw new Exception($msg);
            }
            self::$conn=$conn;
        }
    }
    
    protected function executeQuery($sql){
        $returnVal = mysqli_query(self::$conn, $sql);
		if(! $returnVal ) {
            throw new Exception('Unable to execute SQL Query : ' .  mysqli_error(self::$conn));
		}
        return $returnVal;
    }
    
	public function addGuest( $guest ) {
		$sql = "INSERT INTO guest (guest_name, guest_address, guest_phone, guest_email, date_created)  VALUES ( '".$guest['name']."' , '". $guest['address']."', '".$guest['phone']."', '".$guest['email']."', NOW() )";
        return $this->executeQuery($sql);
	}

	public function addGuests($guests) {
        if(!is_array($guests))
            return false;
            
		foreach($guests as $guest) {
			 $this->addGuest($guest);
		}
        return true;
	}
}