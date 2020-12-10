<?php

require('vendor/autoload.php');

$eventDispatcher = new \App\SimpleEventDispatcher();
$container = new \App\SimpleContainer();
$inflector = new \App\Command\CommandInflector();
$repo = new \App\Domain\Repository\DummyRepository();

$secondBus = new \App\CommandBus\SimpleCommandBus($container,$inflector);
$mainBus = new \App\CommandBus\ValidatorCommandBus($secondBus,$container, $inflector,$eventDispatcher);

$subscriber = new \App\ConsoleSubscriber();
$eventDispatcher->attach($subscriber);

$employeeManager = new \App\EmployeeManager($repo, $mainBus,$eventDispatcher);
$eventDispatcher->attach($employeeManager,'validator:errors');

$employeeManager->createEmployee(
    'Ivan',
    'Ivanov',
    'Ivanovich',
    'Russia',
    'Ivanovo',
    'Ivanovskaya',
    '1',
    '6654455',
    '+7',
    'active'
);

$employeeManager->removeEmployee(1);