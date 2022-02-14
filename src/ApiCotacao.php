<?php

namespace MSCode\TutoriaTurmaII;

class ApiCotacao
{
    public function cotacaoDolarAtual(): float
    {
        $guzzle = new Guzzle();
        $resposta = $guzzle->request('http://gogle.com/api/dolar');

        return json_decode($resposta)->cotacao;
    }
}