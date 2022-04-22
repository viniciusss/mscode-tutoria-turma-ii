<?php

namespace MSCode\TutoriaTurmaII\Banco\Email;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class EnvioEmailSymfony implements EnvioEmailInfraInterface
{
    public function __construct(private readonly Mailer $mailer)
    {}

    public function enviarEmail(Email $email): void
    {
        $this->mailer->send($email);
    }
}