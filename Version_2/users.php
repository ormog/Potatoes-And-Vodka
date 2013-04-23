<?php

class Users 
{
	public $username = null;
	public $password = null;
	public $salt = "Zo4rU5Z1YyKJAASY0PT6EUg7BBYdlEhPaNLuxAwU8lqu1ElzHv0Ri7EM6irpx5w";
	
	public function __construct( $data = array() ) 
	{
		if( isset( $data['username'] ) ) $this->username = stripslashes( strip_tags( $data['username'] ) );
		if( isset( $data['password'] ) ) $this->password = stripslashes( strip_tags( $data['password'] ) );
	}

	public function storeFormValues( $params ) 
	{
		//This stores the parameters.
		$this->__construct( $params );
	}

	public function userLogin() 
	{
		//This variable will be used to return, regardless if the login was successful or not.
		$success = false;
		try
		{
			//Create our pdo object.
			$con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

			//This sets how pdo will handle errors.
			$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			//An sql query for the userLogin function.
			$sql = "SELECT * FROM userData WHERE username = :username AND password = :password LIMIT 1";

			//This prepares the statements.
			$stmt = $con->prepare( $sql );

			//This gives value to named parameter 'username'.
			$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );

			//This gives value to named parameter 'password'.
			$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
			$stmt->execute();

			$valid = $stmt->fetchColumn();

			if( $valid ) 
			{
				$success = true;
			}

			$con = null;
			return $success;

		}
		catch (PDOException $e) 
		{
			echo $e->getMessage();
			return $success;
		}
	}
	
	public function register() 
	{
		$correct = false;
	 	try 
		{
			$con = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$sql = "INSERT INTO users(username, password) VALUES(:username, :password)";

			$stmt = $con->prepare( $sql );
			$stmt->bindValue( "username", $this->username, PDO::PARAM_STR );
			$stmt->bindValue( "password", hash("sha256", $this->password . $this->salt), PDO::PARAM_STR );
			$stmt->execute();

			return "Registration Successful <br/> <a href='index.php'>Login Now</a>";

	   }
	   catch( PDOException $e )
	   {
	   		return $e->getMessage();
	   }
	}
}

?>