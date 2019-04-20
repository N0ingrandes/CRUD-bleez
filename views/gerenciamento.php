<?php

include("template_view.php");
include("../connection.php");
include("../querys.php");

if(isset($_GET['login'])){
    removerProduto($connection,$_GET['login']);
}


 


?>
<h1 class="welcome2">Gerenciamento de Produtos</h1>
<h4>Seção de Alterações</h4>
<h6 class="ui red label">Todos os campos devem ser preenchidos</h6>
<form id ="f_gere"class="ui form form" action="gerenciamento.php" method="post"  >
  <input class="ui input" type="text" name="id_gere" placeholder="ID Produto">
  <input class="ui input" type="text" name="novo_nome" placeholder="Novo Nome">
  <input class="ui input" type="text" name="novo_preco"placeholder="Novo Preço">
  <input class="ui input" type="text" name="nova_desc" placeholder="Nova Descrição">
  <button id="btn_gerenciamento" class="ui purple button " type="submit">Alterar </button>
</form>
<table class="ui striped table">
  <thead>
    <tr>
      <th>Nome Produto</th>
      <th>Preço</th>
      <th>ID Produto</th>
      <th>Remover</th>
    </tr>
  </thead>
  <tbody>
    
  <?php buscaProdutoGerenciamento($connection) ?>
    
  </tbody>
</table>

<?php

if(isset($_POST['id_gere'])){
  alteraDados($connection,$_POST['id_gere'],$_POST['novo_nome'],$_POST['novo_preco'],$_POST['nova_desc']);
  
}

