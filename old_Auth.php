<?php
error_reporting(0);

class Auth
{
    protected $db;

    
    public function __construct(DataBase $DB)
    {
        $this->db = $DB;
    }
    
  public function login($login, $password){
    session_start();
    if(isset($_SESSION["id_session"])){
        $id_rand = $_SESSION["id_session"];
        $id_rand = stripslashes($id_rand);
        $id_rand = htmlspecialchars($id_rand);
        $id_rand = trim($id_rand);
    }

    //echo 'id_rand ='.$id_rand;
    $enrypt = md5(md5($password));
      $auth = "SELECT * FROM users WHERE login ='".$login."' AND password = '".$enrypt."'";
      //echo $auth;
      $conn = $this->db->connect();
      
        $result = $conn->query($auth);
        if(($row = $result->fetch_array()) != false){
           // echo 'перенаправить в кабинет';
            $_SESSION['login'] = $login;
            if(isset($_SESSION['login'])){ header('Location: login.php'); }
            else{ exit; }
            
           // exit;
            

  }
  else { echo 'Не правильный логин или пароль'; }
}

public function passwords(){
  $array = array();
  $sql = "SELECT * FROM `u_passwd_otd_post` WHERE `psswd` IS NOT NULL ORDER BY `u_passwd_otd_post`.`famely` ASC ";
  //echo $auth;
  $conn = $this->db->connect();
  $result = $conn->query($sql);
  while ($row = $result->fetch_array(MYSQLI_BOTH)){
      $array[] = $row;
  }
  return $array;
}

public function personal($guid){
  $array = array();
  $sql = "SELECT * FROM `u_passwd_otd_post` WHERE PERS_ID = '".$guid."'";
  $conn = $this->db->connect();
  $result = $conn->query($sql);
  while ($row = $result->fetch_array(MYSQLI_BOTH)){
      $array[] = $row;
  }
  return $array;
}

public function cartridge(){
  $array = array();
  $sql = "SELECT * FROM `u_passwd_otd_post`";
  $conn = $this->db->connect();
  $result = $conn->query($sql);
  while ($row = $result->fetch_array(MYSQLI_BOTH)){
      $array[] = $row;
  }
  return $array;
}

public function device(){
  $array = array();
  $sql = "SELECT * FROM `u_passwd_otd_post`";
  $conn = $this->db->connect();
  $result = $conn->query($sql);
  while ($row = $result->fetch_array(MYSQLI_BOTH)){
      $array[] = $row;
  }
  return $array;
}

}
