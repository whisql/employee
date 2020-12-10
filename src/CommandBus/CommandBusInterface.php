<?php


namespace App\CommandBus;


interface CommandBusInterface
{
    public function execute($command);
}