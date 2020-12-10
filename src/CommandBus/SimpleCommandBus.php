<?php


namespace App\CommandBus;


use App\Command\CommandInflector;
use App\ContainerInterface;

class SimpleCommandBus implements CommandBusInterface
{
    /**
     * @var CommandInflector
     */
    private $inflector;
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container, CommandInflector $inflector)
    {
        $this->inflector = $inflector;
        $this->container = $container;
    }

    /**
     * @param $command
     * @return mixed
     * @throws \App\Command\Exception\NotFoundHandlerException
     */
    public function execute($command)
    {
        $handlerClass = $this->inflector->getHandlerClass($command);

        return $this->container->make($handlerClass)->handle($command);
    }

}