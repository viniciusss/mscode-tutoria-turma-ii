<?php

namespace MSCode\TutoriaTurmaII\Banco\Movimentacao;

interface MovimentacaoInterface
{

    public function valor(): float;

    public function descricao(): string;

    public function dataHora(): \DateTimeInterface;

    public function documento(): string;
}