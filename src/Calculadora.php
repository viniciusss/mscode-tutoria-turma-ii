<?php

namespace MSCode\TutoriaTurmaII;

class Calculadora
{
    public function __construct(private ApiCotacao $apiCotacao)
    {
    }

    public function somar(int $a, int $b): int
    {
        return $a + $b;
    }

    public function dolarParaReal(float $valor): float
    {
        return $valor * $this->apiCotacao->cotacaoDolarAtual();
    }
}