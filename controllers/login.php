<<<<<<< HEAD
<?php
if(!isset($_SESSION)) { 
session_start(); 
}
  include_once('Conectar.php');
  class Login {    
      public $user;
      public $pass;
      public function __construct($user,$pass){
        $this->user = $user;
        $this->pass = $pass;
      }
      public function loguearse(){
        if(!isset($_SESSION["perfil"],$_SESSION["pass"])){
          
        }
        $consulta = new Conectar(); 
        $tipo_usuario = $consulta->consulta_usuario($this->user,$this->pass);
        if(isset($tipo_usuario)){
          if($tipo_usuario[2] == 'cliente'){
             $_SESSION["perfil"] =  "asdqweasd5654184";
          }else if($tipo_usuario[2]  == 'empleado'){
             $_SESSION["perfil"] = "qwqwsa123423@!";
          }
          $_SESSION["id_usuario"] = $tipo_usuario[0]; // id del usuario
          $_SESSION["id_mail"] = $tipo_usuario[1];// nombre del perfil (administrador, cliente, etc..) 
          return true;
        }else{
          return false;
        }
      }
  }
=======
<?php
  include_once('consultas.php');
  if(!isset($_SESSION)) { 
        session_start(); 
  }
  class Login {    
      public $user;
      public $pass;
      public function __construct($user,$pass){
        $this->user = $user;
        $this->pass = $pass;
      }

      public function loguearse(){ 
        if(!isset($_SESSION["perfil"],$_SESSION["pass"])){
           $_SESSION["perfil"] = "root";
           $_SESSION["pass"] = "";
        }
        $consulta = new Consultas("root",""); 
        $tipo_usuario = $consulta->consulta_usuario($this->user,$this->pass);
        if(isset($tipo_usuario)){
          $rol = $tipo_usuario["tipo_perfil"];
          $_SESSION["id_usuario"] = $tipo_usuario["usuario"]; // id del usuario
          $_SESSION["rol_actual"] = $tipo_usuario["tipo_perfil"]; // nombre del perfil (administrador, cliente, etc..) 
          $_SESSION["perfil"] =  $tipo_usuario["perfil"]; // id del perfil del rol
          $_SESSION["pass"] = $tipo_usuario["pass"]; // password del rol
          return true;
        }else{
          return false;
        }
        
      }
  }
>>>>>>> e7b49836166a8a2b3b0fd3b018afdae047c15f80
?>