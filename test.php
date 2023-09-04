<?php

    namespace Test;

    $opcao = 2;

    match ($opcao){
        0 => numerosPares(),
        1 => imprimirNomes(), 
        2 => MostrarProduto(),
        default =>  'nada acontece feijoada',
    };

    function numerosPares(){
        $numerosParesMax = 20; //Total de todos os numeros
        echo 'numeros Pares de 0 a ' . $numerosParesMax . PHP_EOL  ;
        for($i = 0; $i <= $numerosParesMax; $i++){
            if($i % 2 == 0){
                echo $i . ' é um numero par' . PHP_EOL  ;
            }
            else{
            echo $i . ' não é um numero par' . PHP_EOL  ;
            }
        }
    };

    function imprimirNomes(){
        $nomes = ['João', 'Maria', 'Weverson', 'Winderson'];

        foreach($nomes as $i => $nomes){
            echo "O nome do indice {$i} e o valor: {$nomes}" . PHP_EOL;
        }
    };

    function MostrarProduto(){

        $produto[0] = new Produtos(00, "Chocolate", 5.01);
        $produto[1] = new Produtos(02, "Peixe", 15.90);
        $produto[2] = new Produtos(23, "Leite", 3.51);

        for($i = 0; $i < 3; $i++){
        echo "ID: " . $produto[$i]->id . PHP_EOL;
        echo "Nome: " . $produto[$i]->nome . PHP_EOL;
        echo "Preço: R$" . $produto[$i]->preco . PHP_EOL;
        }
    };

    class Produtos{
        
        public int $id;
        public string $nome;
        public float $preco;

        public function __Construct(int $id,  string $nome, float $preco){
            $this->id = $id;
            $this->nome = $nome;
            $this->preco = $preco;

        }

        public function getID():int{
            return $this->id;
        }

        public function getNome():string{
            return $this->nome;
        }

        public function getPreco():float{
            return $this->preco;
        }

    };

?>