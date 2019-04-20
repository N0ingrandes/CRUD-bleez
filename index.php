<?php
include("connection.php");
include("template.php");
include("querys.php");


?>

<form class="ui form form"action="index.php" method="post" >
  <div class="field">
    <label>Nome</label>
    <input class="input" type="text" name="name_login" placeholder="Nome">
  </div>
  <div class="field">
    <label>Senha</label>
    <input class="input" type="password" name="password_login" placeholder="Senha">
  </div>
  
  <button class="ui button" type="submit">Entrar</button>
</form>


<div class="ui label purple">
  Nome
  <div class="detail ui label primary">bleez</div>
</div>

<div class="ui label purple">
  Senha
  <div class="detail ui label primary">1234</div>
</div>


 <?php 
if(isset($_POST['name_login']) && isset($_POST['password_login'])){
  $usuario = buscarUsuario($connection,$_POST['name_login'],$_POST['password_login']);
  if($usuario ==null){
   echo "<div class='ui warning message'>
   <i class='close icon'></i>
   <div class='header'>
    Senha/Usuário Inválidos!
   </div>
   Tente Novamente!
 </div>";
  }else{
      header('Location:dashboard.php');
      
  }
}
