<?php

include("template_view.php");
include("../connection.php");
include("../querys.php");

if(isset($_GET['produtos'])){
  buscaDadosProduto($connection,$_GET['produtos']);
}

?>

<h1>Pesquisar Produtos</h1>
<div class="ui left icon input">
    <input id="input" type="text" placeholder="Pesquisar Produtos">
   
</div>

<table class="ui striped table">
  <thead>
    <tr>
      <th>Nome Produto</th>
      <th>Preço</th>
    
      <th>Nome Imagem</th>
     <th>Mais Informações</th>
      
      
    </tr>
  </thead>
  <tbody>
  
  <?php buscaProduto($connection) ?>
    
  </tbody>
</table>
<?php 
 

if(isset($_GET['produtos'])){
  
  
  showModal($connection,$_GET['produtos']);
  
 echo " <script>
 
 $(function(){
   
  $('#produto{$_GET['produtos']}').on('click',function(event){
      console.log('oi');
      event.preventDefault();
      $('.ui.modal')
  .modal('show')
;
  })
});
 </script>";
}

 


?>

<script src="../assets/js/busca.js"></script>
