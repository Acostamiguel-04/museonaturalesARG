<?php
include('db.php');
$usuario=$_POST['usuario'];
$password=$_POST['password'];



$consulta="SELECT * FROM usuario WHERE usuario LIKE '$usuario'";
//echo $consulta;
$resultado=mysqli_query($conexion,$consulta);
mysqli_close($conexion);
$filas=mysqli_num_rows($resultado);
    $rta = mysqli_fetch_assoc($resultado);
    $pass2= $rta['contrasenia'];
       
        //$cipher,base64_decode($encrypted_text)
       // echo '<br>'.$password;
       // echo '<br>'. $hash;
        //CONTRASEÑA ES admin
             if (mysqli_num_rows($resultado) ==1&&password_verify($password,$pass2)) {
 session_start();
  
    header("location:../index2.php");

}else{
    ?>
    <?php
    include "index.php" ;

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
//mysqli_free_result($resultado);


