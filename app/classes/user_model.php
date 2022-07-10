<?php
require_once ('../../database/db.php');
session_start();

class dbFunction {
	private $db;
	private $conn;
	//  update in live ????????????

	function __construct() {
		// connecting to database
		$this->db = new Database();
		$this->conn = $this->db->connect();
	}

	// destructor
	function __destruct() {
		
	}
	
	public function UserRegister($username,$firstname,$lastname,$datebirth,$email,$password){
		$dob = new DateTime($datebirth);
		$today = new DateTime('today');
		$age = $dob->diff($today)->y;

		if($age>13)
		{
			$password =  hash('ripemd160', $password . "vive le projet tweet_academy");
			$qr = $this->conn->query("INSERT INTO members(username,firstname,lastname,birthday,email,password) values('".$username."','".$firstname."','".$lastname."','".$datebirth."','".$email."','".$password."')") or die(mysqli_connect_error());
			return $qr;
		}
		else
		{
			echo "<script>alert('You have to be over 13 years old')</script>";
		}
	}

	public function Login($username, $password){
		$res=$this->conn->query("SELECT * FROM members WHERE username = '".$username."'");
		$user_data = $res->fetch_assoc();
		$passwordV =hash('ripemd160', $password . "vive le projet tweet_academy");

		if ($user_data && $passwordV === $user_data['password']) 
		{
			$_SESSION['login'] = true;
			$_SESSION['id'] = $user_data['id'];
			// $_SESSION['gender'] = $user_data['gender'];
			$_SESSION['username'] = $user_data['username'];
			$_SESSION['email'] = $user_data['email'];
			$_SESSION['datebirth'] = $user_data['datebirth'];
			// $_SESSION['city'] = $user_data['city'];
			$_SESSION['firstname'] = $user_data['firstname'];
			$_SESSION['lastname'] = $user_data['lastname'];
			$_SESSION['password'] = $user_data['password'];
			// $_SESSION['image'] = $user_data['image'];
			// $_SESSION['type'] = $user_data['type'];
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function Veryfypassword($currentpass,$email){
		$ress=$this->conn->query("SELECT * FROM users WHERE email = '".$email."'");
		$userpass=$ress->fetch_assoc();
		if ($userpass && password_verify($currentpass,$userpass['password'])){
			return TRUE;
		}
		else{
			return FALSE;
		}	
	}

	public function Editperfil($name,$lastname,$datebirth, $email, $password,$gender,$city,$id){
		$password = password_hash($password, PASSWORD_ARGON2I);
		$queryy = $this->conn->query("UPDATE users SET name='$name', lastname ='$lastname',datebirth='$datebirth',email='$email',password='$password',gender='$gender',city='$city' WHERE id=$id");
		
		$_SESSION['gender'] = $gender;
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['datebirth'] = $datebirth;
		$_SESSION['city'] = $city;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['password'] = $password;
		return $queryy;
	}

	public function EditPass($password,$id){
		$password = password_hash($password, PASSWORD_ARGON2I);
		$queryy = $this->conn->query("UPDATE users SET password='$password' WHERE id=$id");
		return $queryy;
	}

	public function isUserExist($email){
		$qr = $this->conn->query("SELECT * FROM members WHERE email = '".$email."'");
		$row = mysqli_num_rows($qr);

		if($row > 0){
			return true;
		} else {
			return false;
		}
	}
	
	public function PostTweet($text,$id,$dateCreation,$image,$tipo){
		// 
		// $today   = new DateTime('today');
		// $age = $dob->diff($today)->y;
		if(empty($image && $tipo)){
			$qr = $this->conn->query("INSERT INTO tweets(text,member_id,dateCreation) values('".$text."','".$id."','".$dateCreation."')") or die(mysqli_connect_error());
			return $qr;
			// ,media,type
			// ,'".$image."','".$tipo."'
		} else {
			$qr = $this->conn->query("INSERT INTO tweets(text,member_id,dateCreation,media,type) values('".$text."','".$id."','".$dateCreation."','".$image."','".$tipo."')") or die(mysqli_connect_error());
			return $qr;
		}
	}

	public static function hashtagAndMentionTweet($tweet){        
		$tweet = preg_replace("/#([\w]+)/", "<a class='hash-tweet' href='#'>$0</a>", $tweet);		
		$tweet = preg_replace("/@([\w]+)/", "<a class='hash-tweet' href='#'>$0</a>", $tweet);
		return $tweet;		
	}
	

	public function verifyFollower()
	{

	}
}
?>