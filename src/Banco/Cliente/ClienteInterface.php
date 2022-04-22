<?php

namespace MSCode\TutoriaTurmaII\Banco\Cliente;

use MSCode\TutoriaTurmaII\Banco\Email\DestinatarioInterface;

interface ClienteInterface extends DestinatarioInterface
{
    public function nome(): string;

    public function documento(): string;

    public function endereco(): string;

    public function telefone(): string;

    public function referencias(): array;
}