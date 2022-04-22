<?php

namespace MSCode\TutoriaTurmaII\Banco\Email;

use Symfony\Component\Mime\Email;

class EnvioEmail
{
    public function __construct(private readonly EnvioEmailInfraInterface $emailInfra)
    {}

    public function enviar(DestinatarioInterface $destinatario, string $assunto, string $conteudo): void
    {
        $email = (new Email())
            ->from('contato@banco-mscode.com')
            ->to($destinatario->email())
            ->subject($assunto)
            ->text($conteudo);

        $this->emailInfra->enviarEmail($email);
    }
}