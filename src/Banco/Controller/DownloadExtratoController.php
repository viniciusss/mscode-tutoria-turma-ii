<?php

namespace MSCode\TutoriaTurmaII\Banco\Controller;

use MSCode\TutoriaTurmaII\Banco\Conta\ContaInterface;
use MSCode\TutoriaTurmaII\Banco\Exportacao\ExtratoEmJson;

class DownloadExtratoController
{
    public function __construct(private readonly ExtratoEmJson $extrato)
    {}

    public function __invoke(ContaInterface $conta): string
    {
        return $this->extrato->exportar($conta);
    }
}