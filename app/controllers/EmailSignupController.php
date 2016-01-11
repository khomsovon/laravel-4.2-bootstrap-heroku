<?php
use Postmark\PostmarkClient;


class EmailSignupController extends \BaseController {

	/**
	 * Add New User
	 *
	 * @return boolean response
	 */
	public function addNewUser() {
	
		
		$input = Input::all();


		if ($_SERVER['SERVER_NAME'] == 'localhost') {
			$databaseString = "mysql://<user>:<pass>@<db_host>/<database>";
		}
		else {
			$databaseString = getenv("CLEARDB_DATABASE_URL");
		}


		$url = parse_url($databaseString);

		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);

		$conn = new mysqli($server, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM Users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	var_dump($row);
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();


		return 'SEND';
	}
	


	/**
	 * Get a user
	 *
	 * @return boolean response
	 */
	public function getUser() {
	
		
		$input = Input::all();


		if ($_SERVER['SERVER_NAME'] == 'localhost') {
			$databaseString = "mysql://<user>:<pass>@<db_host>/<database>";
		}
		else {
			$databaseString = getenv("CLEARDB_DATABASE_URL");
		}


		$url = parse_url($databaseString);

		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);

		$conn = new mysqli($server, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM Users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	var_dump($row);
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();

		return 'SEND';
	}



	/**
	 * Get a all users
	 *
	 * @return boolean response
	 */
	public function getAllUsers() {
	
		
		$input = Input::all();


		if ($_SERVER['SERVER_NAME'] == 'localhost') {
			$databaseString = "mysql://<user>:<pass>@<db_host>/<database>";
		}
		else {
			$databaseString = getenv("CLEARDB_DATABASE_URL");
		}


		$url = parse_url($databaseString);

		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);

		$conn = new mysqli($server, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM Users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {

		    	var_dump($row);
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();

		return 'SEND';
	}
	
}
