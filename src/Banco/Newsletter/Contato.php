<?php

namespace MSCode\TutoriaTurmaII\Banco\Newsletter;

use MSCode\TutoriaTurmaII\Banco\Email\DestinatarioInterface;

class Contato implements DestinatarioInterface
{

    public function email(): string
    {}


}