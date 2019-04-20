<?php 
include("connection.php");



function cadastraProduto($connection,$nome,$preco,$descricao,$imagem){
    if (isset($nome) && isset($preco) && isset($descricao)) {
        
       
      $id_imagem = idImage($connection);
        $inserir = mysqli_query($connection,"INSERT INTO produtos (nome,preco,descricao,nome_imagem,id_imagem,data) VALUES ('".$nome."','".$preco."','".$descricao."','".$imagem."','".$id_imagem."',NOW())");
      
        if ($connection->query($inserir) === TRUE) {
            header("Location : cadastrar.php");
        }
    }
    
}
function idImage($connection){
    $teste = "";
    $buscaId = mysqli_query($connection,"SELECT * FROM produtos");
    if($buscaId != null){
        while($dados = mysqli_fetch_assoc($buscaId)){
            $id_imagem = $dados['id']+1;
            $teste = $id_imagem;
        }
        
    }else{
        $teste = "1";
    }

    return $teste;
   
}
    
function buscaProduto($connection){
    $busca = mysqli_query($connection,"SELECT * FROM produtos");
    while($dados = mysqli_fetch_assoc($busca)){

        echo "
            <tr class='dados_tabela'>
            <td class='produto_tabela'>".$dados['nome']."</td>
            <td>".$dados['preco']."</td>
            
            <td>".$dados['nome_imagem']."</td>
         
            <td><a href = '../views/pesquisar.php?produtos=".$dados['id']." ' id= produto".$dados['id']." class='ui purple button'>mais</a></td>
        </tr>
        ";
    }

    
}

function buscaDadosProduto($connection,$produtos){
    mysqli_query($connection," SELECT *  FROM produtos WHERE id = '{$produtos}'");

}

function buscaProdutoGerenciamento($connection){
    $busca = mysqli_query($connection,"SELECT * FROM produtos");
    while($dados = mysqli_fetch_assoc($busca)){

        echo "
            <tr class='dados_tabela'>
            <td class='produto_tabela'>".$dados['nome']."</td>
            <td>".$dados['preco']."</td>
            <td>".$dados['id']."</td>
           <td><a href = '../views/gerenciamento.php?login=".$dados['id']."'class='ui red button'>Remover</a></td>
           
        </tr>
        ";
    }

    
}

function removerProduto($connection,$login){
    mysqli_query($connection,"DELETE  FROM produtos WHERE id = '{$login}'");
}

function alteraDados($connection,$id,$nome,$preco,$desc){
mysqli_query($connection,"UPDATE   produtos SET nome = '{$nome}',preco = '{$preco}',descricao='{$desc}' WHERE id =  '{$id}'");

}
function buscarUsuario($connection,$usuario,$senha){
    $buscar = mysqli_query($connection,"SELECT * FROM users WHERE usuario = '{$usuario}' and senha = '{$senha}'");
    $usuario = mysqli_fetch_assoc($buscar);
    return $usuario;
}

function showModal($connection,$id_produto){
    $query = mysqli_query($connection,"SELECT * FROM produtos WHERE id = '{$id_produto}'");
    
    while($dados = mysqli_fetch_assoc($query)){
        echo "
    
        <div class='ui modal'>
      <i class='close'>X</i>
      <div class='header'>
        Nome Produto  : {$dados['nome']}
      </div>
      <div class='image content'>
        <div class='ui medium image'>
          <img class='img_modal' src='logo.png'>
        </div>
        <div class='description'>
          <div class='ui header'>Sobre o Produto</div>
          <h4>Descrição : {$dados['descricao']}</h4>
          <h4 >ID do Produto no Banco de Dados: {$dados['id']}</h4>
          <h4 >ID da Imagem no Banco de Dados: {$dados['id_imagem']}</h4>
          <h4>Data do Cadastro : {$dados['data']}</h4>
        </div>
      </div>
      <div class='actions'>
        <div class='ui purple deny button'>
          Ok!
        </div>
        
      </div>
    </div>";
    }
    
}




    

  

