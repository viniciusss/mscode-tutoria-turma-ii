<?php

namespace MSCode\TutoriaTurmaII\Infraestructure\Database;

use MSCode\TutoriaTurmaII\Domain\Entities\Produto;
use MSCode\TutoriaTurmaII\Domain\Repositories\ProdutoRepository;

class MySQLProdutoRepository implements ProdutoRepository
{
    public function __construct(private readonly \PDO $PDO)
    {}

    public function salvar(Produto $produto): void
    {
        $sql = <<<'SQL'
REPLACE INTO produto (codigo, descricao)
VALUE (:codigo, :descricao)
SQL;
        $stm = $this->PDO->prepare($sql);
        $stm->bindValue(':codigo', $produto->codigo);
        $stm->bindValue(':descricao', $produto->descricao);
        $stm->execute();
    }

    public function buscarPorCodigo(string $codigo): ?Produto
    {
        $stm = $this->PDO->query('SELECT * FROM produto WHERE codigo = :codigo');
        $stm->bindValue(':codigo', $this->PDO->quote($codigo));
        $stm->execute();
        return $stm->fetchObject(Produto::class) ?: null;
    }

}