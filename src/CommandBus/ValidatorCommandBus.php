<?php


namespace App\CommandBus;


use App\Command\CommandInflector;
use App\Constraint\ConstraintInterface;
use App\ContainerInterface;
use App\EventDispatcherInterface;


class ValidatorCommandBus implements CommandBusInterface
{
    /**
     * @var CommandBusInterface
     */
    private $commandBus;

    /**
     * @var CommandInflector
     */
    private $commandInflector;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(CommandBusInterface $commandBus,ContainerInterface $container,CommandInflector $commandInflector,EventDispatcherInterface $eventDispatcher)
    {
        $this->commandBus = $commandBus;
        $this->commandInflector = $commandInflector;
        $this->container = $container;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function execute($command)
    {
        $this->validate($command);

        return $this->commandBus->execute($command);
    }

    /**
     * @param $command
     * @throws \Exception
     */
    public function validate($command)
    {
        $validatorClass = $this->commandInflector->getConstraintClass($command);

        if(!$validatorClass) return;

        $commandConstraint = $this->container->make($validatorClass);
        $errors = [];

        foreach ($commandConstraint->getConstraints() as $method => $constraints){
            if(!method_exists($command,$method)) continue;

            foreach ($constraints as $constraint) {
                if(!$constraint instanceof ConstraintInterface) {
                    throw new \Exception('Constraint must be instance of ConstraintInterface');
                }

                $constraint->validate($command->$method());

                if($constraint->isValid()) continue;

                $errors[$method][] = $constraint->getErrorMessage();
            }
        }

        if(empty($errors)) return;

        $this->eventDispatcher->trigger('validator:errors',$errors);
    }
}