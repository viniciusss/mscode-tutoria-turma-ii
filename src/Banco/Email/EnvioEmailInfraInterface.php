<?php

namespace MSCode\TutoriaTurmaII\Banco\Email;

use Symfony\Component\Mime\Email;

interface EnvioEmailInfraInterface
{
    public function enviarEmail(Email $email): void;
}