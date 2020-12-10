<?php


namespace App\Command;


use App\Command\Exception\CommandClassException;

class RemoveEmployeeHandler implements CommandHandlerInterface
{
    public function handle($command)
    {
        if(!$command instanceof RemoveEmployeeCommand) {
            throw new CommandClassException('Command class must be an instance of RemoveEmployeeCommand');
        }

        return $command->getEmployeeId();
    }

}