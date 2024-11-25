<?php

namespace HyperfTest\Cases\Abstract;

use App\Interface\Repository\UserRepositoryInterface;
use Hyperf\Context\ApplicationContext;
use HyperfTest\HttpTestCase;
use Mockery;

class AbstractTest extends HttpTestCase
{
    public function mockClassMethod(string $class, string $methodName, $return) : void
    {
        $mock = Mockery::mock($class) //parametro do mock() deve condizer com oq esta sendo injetado
        ->shouldReceive($methodName) //o metodo aqui, deve ser o metodo que será chamado diretamente
        ->andReturn($return);

        $container = ApplicationContext::getContainer();
        $container->define(
            $class,
            fn () => $mock->getMock()->makePartial(),
        );
    }
}