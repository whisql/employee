<?php


namespace App\Command;


interface CommandConstraintInterface
{
    public function getConstraints():array;
}