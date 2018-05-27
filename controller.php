<?php
/**
* Base Controller 
*/
class BaseController 
{
	

	/*SQL Credentials*/
	private $user;
	private $host;
	private $password;
	private $database;
	/*SQL Connect*/
	protected $mysql;
	function __construct()
	{
		/*SQL Credentials*/
		$this->user ='root';
		$this->database ='diplom';
		$this->host= 'localhost';
		$this->password = 'root';
		$this->mysql = $this->dataBaseConnect();
	}

	/**
	*database connect
	*/
	protected  function dataBaseConnect()
	{
		    $dbh = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);

		return $dbh;

	}


	/**
	* all users selects
	*/
	public function getAllUsers()
	{

		return  $this->mysql->query('SELECT * FROM users');	
	}

	/*
	* Insert into table `users` data 
	*/
	public function setUserFromData($name, $email, $pass)
	{
		$statement = $this->mysql->prepare("INSERT INTO users(name, email, password)
   						 VALUES(:name, :email, :password)");

		$statement->execute([
    					"name" => $name,
    					"email" =>  $email,
    					"password" => $pass
    	]);

	}



}

$DataController = new BaseController();



	$DataController->setUserFromData($_POST['name'], $_POST['email'], $_POST['password']);
	echo 'Hello '. $_POST['name']. $_POST['email'] .$_POST['password'].'!';



?>