<?php

include("template_view.php");
include("../connection.php");
include("../querys.php");

?>
<h1 class="main_cadastro">Cadastro de Produtos</h1>

<div id="formulario">
<form class="ui form form" action="cadastrar.php" method="post" enctype="multipart/form-data" >
    <div class="field">
        <label class="item"><span style="color:white">Nome Produto</span></label>
        <input type="text" name="produto" placeholder="Produto">
    </div>
    
    <div class="field">
        <label class="item"><span style="color:white">Preço</span></label>
        <input type="text" name="preco" placeholder="Preço">
    </div>
    
    <div class="ui form">
    <div class="descricao">
    <div class="field">
        <label>Descrição</label>
        <textarea name="descricao" rows="2"></textarea>
      </div>
      </div>
</div>
<div id="input_id"class="ui action input">
    <input type="text" placeholder="" readonly>
    <input  name= "image_file" type="file">
    <div class="ui icon button">
        <i class=""><= imagem produto</i>
    </div>
</div>


    <button class="ui purple button " id="btn" type="submit">Cadastrar </button>

</div>
<script src="./assets/js/teste.js"></script>
<?php 

if (isset($_POST['produto']) && isset($_POST['preco']) && isset($_POST['descricao'])) {
    cadastraProduto($connection,$_POST['produto'],$_POST['preco'],$_POST['descricao'],$_FILES['image_file']['name']);
    
   
  }

if (isset($_FILES['image_file'])) {
    $extensao = strtolower(substr($_FILES['image_file']['name'],-4));
    $novo_nome = md5(time()).$extensao;
    $diretorio = "../views/img_upload/";

    move_uploaded_file($_FILES['image_file']['tmp_name'],$diretorio.$novo_nome);
    
   
    
    
}

