<?php

namespace MSCode\TutoriaTurmaII\Banco\Conta;

use MSCode\TutoriaTurmaII\Banco\Movimentacao\MovimentacaoInterface;

class ContaPoupanca implements ContaInterface
{
    /** @var array<int, MovimentacaoInterface> */
    protected array $movimentacoes = [];

    public function __construct(private float $saldoInicial = .0)
    {}

    public function saldo(): float
    {
        return $this->saldoInicial + array_sum(
            array_map(
                fn(MovimentacaoInterface $movimentacao) => $movimentacao->valor(),
                $this->extrato(),
            )
        );
    }

    public function movimentar(MovimentacaoInterface $movimentacao): void
    {
        $saldoAtual = $this->saldo();

        if ($saldoAtual+$movimentacao->valor() < .0) {
            throw new \LogicException('O valor é maior que o permitido.');
        }

        $this->movimentacoes[] = $movimentacao;
    }

    /** @return array<int, MovimentacaoInterface> */
    public function extrato(): array
    {
        return $this->movimentacoes;
    }

}