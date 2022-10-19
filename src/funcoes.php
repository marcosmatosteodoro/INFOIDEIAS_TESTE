<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        // Pega a quantidade de caracter para adequar o código
        $len = strlen($ano);

        if($ano <= 0){
            $grupo1 = 0;
            $validacao = false;
        }elseif($len > 2){
            $grupo1 = substr($ano, 0, $len -2);
            $grupo2 = substr($ano, -2, 2);
            $validacao = $grupo2 !== '00';
        }else{
            $grupo1 = 1;
            $validacao = false;
        }

        return $validacao ? $grupo1 + 1 : $grupo1;
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {

        // Pega o intervalo do numero enviado por parametro até 1
        for($numero--; $numero >= 0; $numero--){
            if($this->ePrimo($numero)) return $numero;
        }
        return $numero ;

    }

    private function ePrimo(int $numero): bool {
        for($divisor = $numero -1 ; $divisor > 1; $divisor--){
            if(is_int($numero / $divisor))
                return false;
        }
        return true;
    }









    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $novoArray = [];

        foreach($arr as $newArr){
            $novoArray = array_merge($novoArray, $newArr);
        }
        // Seta um novo array sem o maio indice
        $maiorValor = max($novoArray);
        $novoArray = array_diff($novoArray, [$maiorValor]);

        return max($novoArray);
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false 
    [1, 3, 2]  true 
    [1, 2, 1, 2]  false 
    [3, 6, 5, 8, 10, 20, 15] false 
    [1, 1, 2, 3, 4, 4] false 
    [1, 4, 10, 4, 2] false 
    [10, 1, 2, 3, 4, 5] true 
    [1, 1, 1, 2, 3] false 
    [0, -2, 5, 6] true 
    [1, 2, 3, 4, 5, 3, 5, 6] false 
    [40, 50, 60, 10, 20, 30] false 
    [1, 1] true 
    [1, 2, 5, 3, 5] true 
    [1, 2, 5, 5, 5] false 
    [10, 1, 2, 3, 4, 5, 6, 1] false 
    [1, 2, 3, 4, 3, 6] true 
    [1, 2, 3, 4, 99, 5, 6] true 
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true 
    [3, 5, 67, 98, 3] true 

     * */
    
	public function SequenciaCrescente(array $arr): boolean  {
        
        //Percorre todos os arrays retirando um indice
        foreach($arr as $key=>$valuess){
            $arrayMenosUmIndice = $arr;
            unset($arrayMenosUmIndice[$key]);

            if($this->eSequencia($arrayMenosUmIndice)) 
                return true;
        }
        return false;
    }

    private function eSequencia(array $arr): bool{
        $numeroAnterior = 0;
        $primeiro = true;

        foreach($arr as $numeroAtual){
            if(!$primeiro && $numeroAnterior >= $numeroAtual)
                    return false;
            
                $numeroAnterior = $numeroAtual;
                $primeiro = false;
        }
        return true;
    }
}
