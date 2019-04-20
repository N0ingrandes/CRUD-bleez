var input = document.querySelector("#input");

input.addEventListener('input',function(){
    var dados = document.querySelectorAll('.dados_tabela');

    if(this.value.length>0){
        for (var i =0;i<dados.length;i++) {
            var dadosObtidos = dados[i];
            var produtos = dadosObtidos.querySelector('.produto_tabela').textContent;

            var regex = new RegExp(this.value,'i');
            if(regex.test(produtos)) {
                dadosObtidos.classList.remove('ocultar');
            }else{
                dadosObtidos.classList.add('ocultar');
            }
        }
    }else{
        for(var i =0;i<dados.length;i++){
            var dadosObtidos = dados[i];
            dadosObtidos.classList.remove('ocultar');
        }
    }
})



  