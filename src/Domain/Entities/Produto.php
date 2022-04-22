<?php

namespace MSCode\TutoriaTurmaII\Domain\Entities;

class Produto
{
    public function __construct(public readonly string $codigo, public string $descricao)
    {}
}