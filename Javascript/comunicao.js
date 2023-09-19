function criarProduto() {
    var nomeProduto = document.getElementById("criarProdutoNome").value;
    
    // Faça qualquer processamento necessário aqui (por exemplo, exibir o nome do produto)
    var resultadoDiv = document.getElementById("resultado");
    resultadoDiv.innerHTML = "Produto criado: " + nomeProduto;
}
