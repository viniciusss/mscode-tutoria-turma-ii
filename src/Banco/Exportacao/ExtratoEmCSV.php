<?php

namespace MSCode\TutoriaTurmaII\Banco\Exportacao;

use MSCode\TutoriaTurmaII\Banco\Conta\ContaInterface;

class ExtratoEmCSV
{

    public function exportar(ContaInterface $conta): string
    {
        $csv = [];

        foreach ($conta->extrato() as $movimentacao) {
            $csv[] = sprintf(
                '%s;%s;%s',
                $movimentacao->dataHora()->format('d/m/Y'),
                $movimentacao->descricao(),
                $movimentacao->valor(),
            );
        }

        return implode(PHP_EOL, $csv);
    }
}