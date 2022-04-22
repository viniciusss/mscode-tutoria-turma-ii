<?php

namespace MSCode\TutoriaTurmaII\Domain\Repositories;

use MSCode\TutoriaTurmaII\Domain\Entities\Produto;

interface ProdutoRepository
{
    public function salvar(Produto $produto): void;

    public function buscarPorCodigo(string $codigo): ?Produto;
}