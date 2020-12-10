<?php


namespace App\Command;


interface CommandHandlerInterface
{
    public function handle($command);
}