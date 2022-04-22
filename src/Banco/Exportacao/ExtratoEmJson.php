<?php

namespace MSCode\TutoriaTurmaII\Banco\Exportacao;

use MSCode\TutoriaTurmaII\Banco\Conta\ContaCorrente;
use MSCode\TutoriaTurmaII\Banco\Conta\ContaInterface;

class ExtratoEmJson extends ExtratoEmCSV
{

    public function exportar(ContaInterface $conta): string
    {
        if (!$conta instanceof ContaCorrente) {
            throw new \Exception('apenas contas correntes tem esse recurso');
        }

        $movimentacoes = [];

        foreach ($conta->extrato() as $movimentacao) {
            $movimentacoes[] = [
                'data' => $movimentacao->dataHora()->format('d/m/Y'),
                'descricao' => $movimentacao->descricao(),
                'valor' => $movimentacao->valor(),
            ];
        }

        return json_encode($movimentacoes);
    }

}