<?php

namespace MSCode\TutoriaTurmaII\Infraestructure\Database;

use MSCode\TutoriaTurmaII\Domain\Entities\Produto;
use MSCode\TutoriaTurmaII\Domain\Repositories\ProdutoRepository;

class MongoProdutoRepository implements ProdutoRepository
{

    public function __construct(private \MongoDB $mongoDB)
    {}

    public function salvar(Produto $produto): void
    {
//        $this->mongoDB->
    }

    public function buscarPorCodigo(string $codigo): ?Produto
    {
        // TODO: Implement buscarPorCodigo() method.
    }


}