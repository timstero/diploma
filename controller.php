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
	public function setFromData($name, $email, $title, $text)
	{
		$statement = $this->mysql->prepare("INSERT INTO questions(name, email, title, description, created_at)
   						 VALUES(:name, :email, :title, :description, :created_at)");

		$statement->execute([
    					"name" => $name,
    					"email" =>  $email,
    					"title" => $title,
    					"description" => $text,
    					"title" => $title,
                        "created_at" => date("Y-m-d H:i:s")
        ]);

	}



}

$DataController = new BaseController();

$DataController->setFromData($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
echo 'Your question has been sent';



?>