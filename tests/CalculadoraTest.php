<?php

namespace MSCode\TutoriaTurmaII\Tests;

use MSCode\TutoriaTurmaII\ApiCotacao;
use MSCode\TutoriaTurmaII\Calculadora;
use PHPUnit\Framework\TestCase;

/**
 * @covers \MSCode\TutoriaTurmaII\Calculadora
 */
class CalculadoraTest extends TestCase
{

    /**
     * @covers \MSCode\TutoriaTurmaII\Calculadora::somar
     */
    public function testSomaDe1Mais1DeveRetornar2(): void
    {
        $calculadora = new Calculadora(new ApiCotacao());
        $this->assertEquals(2, $calculadora->somar(1, 1));
    }

    /**
     * @covers \MSCode\TutoriaTurmaII\Calculadora::dolarParaReal
     * @dataProvider getTabelasCotacoes
     */
    public function test1DolarDeveSerIgualA6Reais(float $dolarAtual, float $dolares, $realEsperado): void
    {
        $apiCotacao = $this->getMockBuilder(ApiCotacao::class)
            ->getMock();

        $apiCotacao
            ->expects(self::once())
            ->method('cotacaoDolarAtual')
            ->willReturn($dolarAtual)
        ;

        $calculadora = new Calculadora($apiCotacao);
        $this->assertEquals($realEsperado, $calculadora->dolarParaReal($dolares));
    }

    public function getTabelasCotacoes(): array
    {
        return [
            [6.0, 2.0, 12.0],
            [5.25, 6.0, 31.50],
        ];
    }
}