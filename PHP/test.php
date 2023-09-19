<?php
session_start();

if (!isset($_SESSION['pos'])) {
    $_SESSION['pos'] = 0; // Inicialize com o valor inicial desejado
}

if (!isset($_SESSION['produtos'])) {
    // Inicialize o array de produtos se ainda não existir na sessão
    $_SESSION['produtos'] = array(
        new Produtos(0, "Chocolate", 5.01),
        new Produtos(2, "Peixe", 15.90),
        new Produtos(23, "Leite", 3.51)
    );
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Document</title>
</head>

<body>
    <form method="GET">
        <div>
            <label for="criarProdutoNome">Nome do Produto:</label>
            <input type="text" id="criarProdutoNome" name="criarProdutoNome">
            <button type="submit" name="acao" value="criar">Criar Produto</button>
        </div>
    </form>
    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
        </tr>
        <div id="resultado">
            <?php


            $opcao = 2;

            match ($opcao) {
                0 => numerosPares(),
                1 => imprimirNomes(),
                2 => MostrarProduto(),
                default =>  'nada acontece feijoada',
            };

            function numerosPares()
            {
                $numerosParesMax = 20; //Total de todos os numeros
                echo 'numeros Pares de 0 a ' . $numerosParesMax . PHP_EOL;
                for ($i = 0; $i <= $numerosParesMax; $i++) {
                    if ($i % 2 == 0) {
                        echo $i . ' é um numero par' . PHP_EOL;
                    } else {
                        echo $i . ' não é um numero par' . PHP_EOL;
                    }
                }
            };

            function imprimirNomes()
            {
                $nomes = ['João', 'Maria', 'Weverson', 'Winderson'];

                foreach ($nomes as $i => $nomes) {
                    echo "O nome do indice {$i} e o valor: {$nomes}" . PHP_EOL;
                }
            };


            function MostrarProduto()
            {

                $produtoNovoNome = $_GET['criarProdutoNome'];

                $produtos = $_SESSION['produtos'];


                if (isset($_GET['acao'])) {
                    $acao = $_GET['acao'];

                    if ($acao === 'criar') {
                        // O botão "Criar Produto" foi clicado
                        $pos = count($produtos);
                        $produtos[] = new Produtos($pos, $produtoNovoNome, rand(0, 1000) / 100);

                        // Atualize o array de produtos na sessão
                        $_SESSION['produtos'] = $produtos;
                    }
                }

                foreach ($produtos as $produtos) {

                    echo "<tr>" . PHP_EOL;
                    echo "<td> " . $produtos->id . PHP_EOL . "</td>";
                    echo "<td> " . $produtos->nome . PHP_EOL . "</td>";
                    echo "<td> R$" . $produtos->preco . PHP_EOL . "</td>";
                    echo "</tr>" . PHP_EOL;
                }

                // echo "Produto não encontrado.";
            };

            class Produtos
            {

                public int $id;
                public string $nome;
                public float $preco;

                public function __Construct(int $id,  string $nome, float $preco)
                {
                    $this->id = $id;
                    $this->nome = $nome;
                    $this->preco = $preco;
                }

                public function getID(): int
                {
                    return $this->id;
                }

                public function getNome(): string
                {
                    return $this->nome;
                }

                public function getPreco(): float
                {
                    return $this->preco;
                }
            };

            ?>

        </div>
    </table>

</body>

</html>