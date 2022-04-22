<?php

namespace MSCode\TutoriaTurmaII\Banco\Email;

interface DestinatarioInterface
{
    public function email(): string;
}