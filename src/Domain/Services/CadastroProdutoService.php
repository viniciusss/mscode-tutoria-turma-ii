<?php

namespace MSCode\TutoriaTurmaII\Domain\Services;

use MSCode\TutoriaTurmaII\Domain\Entities\Produto;
use MSCode\TutoriaTurmaII\Domain\Repositories\ProdutoRepository;

class CadastroProdutoService
{
    public function __construct(private readonly ProdutoRepository $produtoRepository)
    {}

    public function criarProduto(string $codigo, string $descricao): Produto
    {
        $produtoExiste = $this->produtoRepository->buscarPorCodigo($codigo);

        if (false === is_null($produtoExiste)) {
            throw new \Exception('Já existe um produto com esse código');
        }

        $produto = new Produto($codigo, $descricao);
        $this->produtoRepository->salvar($produto);

        return $produto;
    }
}