<?php
session_start();
error_reporting(0);

require_once 'config.php';
class CMS
{

	public $DB;
	
	public function __construct()
	{
		global $db_user;
		global $db_pass;
		$this->DB = new PDO("mysql:host=localhost;dbname=0wlz", $db_user, $db_pass);
	}
	public function create_page($nome, $contenuto)
	{
		
		$nome = htmlspecialchars(trim($nome));
		$contenuto = htmlspecialchars(trim($contenuto));
		
		$res = $this->DB->prepare("INSERT INTO `pagine` (`nome`,`contenuto`) VALUES (:nome, :contenuto);");
		
		if(!$res->execute(Array(":nome" => $nome, ":contenuto" => $contenuto)))
			die("Error: ".mysql_error());
		
		echo '<script type="text/javascript"> alert(\'Pagina creata con successo\');</script>';
	}
	
	public function show_page()
	{
		$res = $this->DB->prepare("SELECT * FROM `pagine`");
		$res->execute();
		foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row)
		{
			echo '<section id="'.$row['nome'].'">
			<div class="container ptb">
			<div class="row">
			<h2 class="centered mb">'.$row['nome'].'</h2>
			'.htmlspecialchars_decode($row['contenuto']).'
			</div>
			</section>';
		}
		
	}
	
	public function showTextPage($page)
	{
		$res = $this->DB->prepare("SELECT * FROM `pagine` WHERE nome = :nome");
		$res->execute(Array(":nome" => $page));
		$row = $res->fetch(PDO::FETCH_ASSOC);
		
		$content = htmlspecialchars_decode($row['contenuto']);
		
		echo '<form method="POST" action="">
		<textarea rows="30" class="form-control" name="pagecontent">'.$content.'</textarea><br>
						
			<button class="btn  btn-primary btn-block" type="submit">Modifica</button></form>';
	}
	
	public function showpagemod()
	{
		$res = $this->DB->prepare("SELECT * FROM `pagine`");
		$res->execute();
		foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row)
		{
			echo '<a href="?mod_page='.$row['nome'].'">'.$row['nome'].'</a><hr>';
		}
	}
	
	public function mod_page($page_name, $page_content)
	{
		$page_content = htmlspecialchars(trim($page_content));
		
		$res = $this->DB->prepare("UPDATE `pagine` SET contenuto=:con WHERE nome = :nome;");
		if(!$res->execute(Array(":con" => $page_content, ":nome" => $page_name)))
			die(mysql_error());
		echo '<script type="text/javascript">alert(\'Pagine Modificata con successo\');</script>';
	}
	
	
	public function showpagedel()
	{
		$res = $this->DB->prepare("SELECT * FROM `pagine`");
		$res->execute();
		foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row)
		{
			echo '<a href="?del_page='.$row['nome'].'">'.$row['nome'].'</a><hr>';
		}
	}
	
	public function deletePage($page_name)
	{
		$res = $this->DB->prepare("DELETE FROM `pagine` WHERE nome = :nome");
		if(!$res->execute(Array(":nome"=>$page_name)))
			die("Error: ".mysql_error());
		
		echo '<script type="text/javascript">alert(\'Pagina rimossa\');</script>';
	}
	
	public function show_menu()
	{
		$res = $this->DB->prepare("SELECT * FROM `pagine`");
		$res->execute();
		foreach($res->fetchAll(PDO::FETCH_ASSOC) as $row)
		{
			echo "<li><a class=\"page-scroll\" href=\"#".$row['nome']."\">".$row['nome']."</a></li>";
		}
		
	}
	
	public function login($user, $pass)
	{
		$user = htmlspecialchars(trim($user));
		$pass = md5(htmlspecialchars(trim($pass)));
		
		$res = $this->DB->prepare("SELECT * FROM `admin` WHERE username = :user");
		if(!$res->execute(Array(":user"=>$user)))
			die(mysql_error());
		
		$row = $res->fetch(PDO::FETCH_ASSOC);
		
		if(!$row['password'] == $pass)
			die("Errore: password errata!");
		
		$_SESSION['logged'] = $row;
		
		return true;
		
	}
	
	public function newAdmin($username, $pass, $email)
	{
		$username = htmlspecialchars(trim($username));
		$pass = md5(htmlspecialchars(trim($pass)));
		$email = htmlspecialchars(trim($email));
		
		$res = $this->DB->prepare("INSERT INTO `admin` (`username`, `password`, `email`) VALUES (:user, :pass, :email);");
		if(!$res->execute(Array(":user" => $username, ":pass" => $pass, ":email" => $email)))
			die("Error: ".mysql_error());
		
		echo '<script type="text/javascript"> alert(\'Admin aggiunto con successo\');</script>';
		
	}
	
	public function deleteAdmin($username)
	{
		$username = htmlspecialchars(trim($username));
		$res = $this->DB->prepare("DELETE FROM `admin` WHERE username = :user");
		if(!$res->execute(Array(":user"=>$username)))
			die("Error: ".mysql_error());
		
		echo '<script type="text/javascript">alert(\'Admin rimosso\');</script>';
	}
	
	public function isLogged()
	{
		return $_SESSION['logged'];
	}
	
	public function logOut()
	{
		session_destroy();
	}
	
}
?>
