<?php


namespace App\Command;


use App\Command\Exception\NotFoundHandlerException;

class CommandInflector
{
    public function getHandlerClass($command)
    {
        $commandName = $this->getCommandName($command);

        $commandHandlerClass = '\\App\Command\\' . str_replace('Command', 'Handler', $commandName);

        if (!class_exists($commandHandlerClass)) {
            throw new NotFoundHandlerException(sprintf('Not found handler class (%s)', $commandHandlerClass));
        }

        return $commandHandlerClass;
    }

    public function getConstraintClass($command)
    {
        $commandName = $this->getCommandName($command);

        $commandValidatorClass = '\\App\Command\\' . str_replace('Command', 'Constraint', $commandName);

        if (!class_exists($commandValidatorClass)) return false;

        return $commandValidatorClass;
    }

    private function getCommandName($command)
    {
        $class_name = get_class($command);

        $pos = strrpos($class_name, '\\');

        if (!$pos) {
            return $class_name;
        }

        return substr($class_name, $pos + 1);
    }
}