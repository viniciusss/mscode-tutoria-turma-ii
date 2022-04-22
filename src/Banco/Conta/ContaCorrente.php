<?php

namespace MSCode\TutoriaTurmaII\Banco\Conta;

use MSCode\TutoriaTurmaII\Banco\Movimentacao\MovimentacaoInterface;

class ContaCorrente extends ContaPoupanca
{
    public function __construct(float $saldoInicial = .0, private float $limiteEspecial = .0)
    {
        parent::__construct($saldoInicial);
    }

    public function movimentar(MovimentacaoInterface $movimentacao): void
    {
        $valorDisponivelMovimentacao = $this->saldo() + $this->limiteEspecial;

        if ($valorDisponivelMovimentacao + $movimentacao->valor() < .0) {
            throw new \Exception('O valor excede o disponivel');
        }

        $this->movimentacoes[] = $movimentacao;
    }

    public function saldo(): float
    {
        return parent::saldo() + $this->limiteEspecial;
    }

    public function nomeDoCliente(): string
    {}
}
