<?php

namespace MSCode\TutoriaTurmaII\Banco\Conta;

use MSCode\TutoriaTurmaII\Banco\Movimentacao\MovimentacaoInterface;

interface ContaInterface
{
    public function saldo(): float;

    public function movimentar(MovimentacaoInterface $movimentacao): void;

    /** @return array<int, MovimentacaoInterface> */
    public function extrato(): array;
}