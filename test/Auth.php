<?php 
class db{
    function __construct(){
        $dbhost = 'localhost';
        $dbuser = 'apache'; 
        $dbpwd  =   '123'; 
        $dbname =   'gtp';
  
        $mysqli =new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
        $this->db = $mysqli;
      }
}

class connect extends db{
    public function login($login, $password){
        session_start();
          $enrypt = md5(md5($password));
          $auth = "SELECT * FROM users WHERE login ='".$login."' AND password = '".$enrypt."'";
            //echo $auth;
          $result = $this->db->query($auth);
         // $row = $result->fetch_array();
             /* определение числа рядов в выборке */
        $row_cnt = $result->num_rows;
    
       // printf("В выборке %d рядов.\n", $row_cnt);
         // if(isset($result)){
          if($row_cnt != 0 ){
              
            $_SESSION['login'] = $login;
            if(isset($_SESSION['login'])){
                 header('Location: login.php'); 
                }
            else{ session_start(); 
                session_unset();
                session_destroy(); 
                header('Location: /gad/test/login.php');
                echo 'error'; 
                  exit();
                }
          }
          else{ 
              if($login != '' AND $password !=''){
                  echo '<div class="container d-flex justify-content-center h-100">Не правильный логин или пароль</div>';
              }
            }
      }

      public function select_sql($sql){
        $array = array();
        $result = $this->db->query($sql);
        while ($row = $result->fetch_array(MYSQLI_BOTH)){
            $array[] = $row;
        }
        return $array;
      }
}
?>